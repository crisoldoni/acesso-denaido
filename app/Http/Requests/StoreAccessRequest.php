<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAccessRequest extends FormRequest
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
        if ($this->isMethod('get')) {
            return [];
        }

        return [
            'name' => 'required|string|min:6|max:255',
            'rust_id' => 'required|string|min:6|max:15',
            'password' => [
                'required',
                'string',
                'min:6',
                'max:15',
                Rule::unique('accesses', 'password')->ignore($this->access, 'id'),
            ],
            'id_group' => 'required|exists:groups,id',
            'id_person' => 'required|exists:people,id'
        ];
    }


    public function messages(): array
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'name.string' => 'O campo nome deve ser uma string.',
            'name.min' => 'O campo nome deve ter no mínimo 6 caracteres.',
            'rust_id.required' => 'O campo Rust ID é obrigatório.',
            'rust_id.string' => 'O campo Rust ID deve ser uma string.',
            'rust_id.min' => 'O campo Rust ID deve ter no mínimo 6 caracteres.',
            'rust_id.max' => 'O campo Rust ID deve ter no máximo 15 caracteres.',
            'password.required' => 'O campo senha é obrigatório.',
            'password.string' => 'O campo senha deve ser uma string.',
            'password.min' => 'O campo senha deve ter no mínimo 6 caracteres.',
            'password.max' => 'O campo senha deve ter no máximo 15 caracteres.',
            'id_group.required' => 'O campo grupo é obrigatório.',
            'id_group.exists' => 'O grupo informado não existe.',
            'id_person.required' => 'O campo cliente é obrigatório.',
            'id_person.exists' => 'O cliente informado não existe.',
        ];
    }
}
