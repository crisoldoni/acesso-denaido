<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePersonRequest extends StorePersonRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = parent::rules();

        // Atualiza as regras para o campo 'name'
        $rules['name'] = [
            'required',
            'string',
            'min:3',
            'max:255',
        ];
        
        return $rules;
    }
}
