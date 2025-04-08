<?php

namespace App\Http\Requests;

use App\Rules\CpfCnpj;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class StorePersonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:255',
            'cpfcnpj' => [
                'required',
                'string',
                new CpfCnpj(),
                Rule::unique('people', 'cpfcnpj')->ignore($this->person, 'id'),
            ],
        ];
    }

    /**
     * Get custom messages for validation errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'name.string' => 'O campo nome deve ser uma string.',
            'name.min' => 'O campo nome deve ter no mínimo 3 caracteres.',
            'name.max' => 'O campo nome deve ter no máximo 255 caracteres.',
            'cpfcnpj.required' => 'O campo CPF/CNPJ é obrigatório.',
            'cpfcnpj.string' => 'O campo CPF/CNPJ deve ser uma string.',
            'cpfcnpj.unique' => 'O CPF/CNPJ informado já está cadastrado.',
            'cpfcnpj.cpfcnpj' => 'O CPF/CNPJ informado não é válido.',
        ];
    }
}
