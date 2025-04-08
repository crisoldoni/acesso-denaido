<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGroupRequest extends FormRequest
{
    private const STRING_MIN_LENGTH = 3;
    private const STRING_MAX_LENGTH = 255;

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
            'name' => 'required|string|min:' . self::STRING_MIN_LENGTH . '|max:' . self::STRING_MAX_LENGTH,
            'id_person' => 'required|exists:people,id',
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
            'name.min' => 'O campo nome deve ter no mínimo ' . self::STRING_MIN_LENGTH . ' caracteres.',
            'name.max' => 'O campo nome deve ter no máximo ' . self::STRING_MAX_LENGTH . ' caracteres.',
            'id_person.required' => 'O campo cliente é obrigatório.',
            'id_person.exists' => 'O cliente informado não existe.',
        ];
    }
}
