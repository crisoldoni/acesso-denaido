<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class ValidateAccessPasswordRequest extends FormRequest
{
    private const MAX_ATTEMPTS = 3;

    public function authorize(): bool
    {
        return Auth::check(); // Garante que o usuário está autenticado
    }

    public function rules(): array
    {
        return [
            'password' => ['required', 'string'] // Apenas validação básica
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $attemptsKey = 'password_attempts_' . $this->route('access');
        $attempts = Session::get($attemptsKey, 0) + 1;

        if ($attempts >= self::MAX_ATTEMPTS) {
            $this->revokeSession();
            Session::flash('error', 'Você excedeu o número de tentativas. Faça login novamente.');
            throw new ValidationException($validator, redirect()->route('login')->withErrors([
                'password' => 'Você excedeu o número de tentativas. Faça login novamente.'
            ]));
        }

        Session::put($attemptsKey, $attempts);
        parent::failedValidation($validator);
    }

    protected function passedValidation()
    {
        $this->validatePassword(); // Agora chamamos a validação correta!

        $attemptsKey = 'password_attempts_' . $this->route('access');
        $sessionKey = 'access_authenticated_' . $this->route('access');

        Session::forget($attemptsKey);
        Session::put($sessionKey, true);
    }

    private function validatePassword()
    {
        $user = Auth::user();

        if (!$user || !Hash::check($this->password . $user->salt, $user->password)) {
            $validator = validator()->make([], []);
            $validator->errors()->add('password', 'Senha incorreta.');
            $this->failedValidation($validator);
        }
    }

    private function revokeSession()
    {
        Auth::logout();
        Session::invalidate();
        Session::regenerateToken();
    }
}
