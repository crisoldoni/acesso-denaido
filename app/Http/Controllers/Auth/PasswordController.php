<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $user = $request->user();

        // Recupera o salt armazenado no banco de dados
        $storedSalt = $user->salt;
        
        // Verifica se a senha atual fornecida está correta (incluindo o salt)
        if (!Hash::check($validated['current_password'] . $storedSalt, $user->password)) {
            return back()->withErrors(['current_password' => 'A senha atual está incorreta.']);
        }

        // Gerar um novo salt
        $newSalt = bin2hex(random_bytes(16));

        // Atualizar a senha com o novo salt
        $user->update([
            'salt' => $newSalt,
            'password' => Hash::make($validated['password'] . $newSalt),
        ]);

        return back()->with('status', 'password-updated')->with('success', 'Senha alterada com sucesso!');
    }
}
