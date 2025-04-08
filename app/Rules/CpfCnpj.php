<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CpfCnpj implements Rule
{
    public function passes($attribute, $value)
    {
        $value = preg_replace('/\D/', '', $value); // Remove caracteres não numéricos

        if (strlen($value) === 11) {
            return $this->validateCpf($value);
        } elseif (strlen($value) === 14) {
            return $this->validateCnpj($value);
        }

        return false;
    }

    public function message()
    {
        return 'O CPF/CNPJ informado não é válido.';
    }

    private function validateCpf($cpf)
    {
        // Remove caracteres não numéricos
        $cpf = preg_replace('/\D/', '', $cpf);

        // Verifica se possui 11 dígitos e não é uma sequência repetida (ex: 111.111.111-11)
        if (strlen($cpf) != 11 || preg_match('/^(\d)\1{10}$/', $cpf)) {
            return false;
        }

        // Cálculo dos dígitos verificadores
        for ($t = 9; $t < 11; $t++) {
            $sum = 0;
            for ($i = 0; $i < $t; $i++) {
                $sum += $cpf[$i] * (($t + 1) - $i);
            }
            $digit = ($sum % 11) < 2 ? 0 : 11 - ($sum % 11);

            // Verifica se o dígito calculado é igual ao dígito real do CPF
            if ($cpf[$t] != $digit) {
                return false;
            }
        }

        return true;
    }

    private function validateCnpj($cnpj)
    {
        // Remove caracteres não numéricos
        $cnpj = preg_replace('/\D/', '', $cnpj);

        // Verifica se possui 14 dígitos e se não é uma sequência repetida (ex: 11111111111111)
        if (strlen($cnpj) != 14 || preg_match('/^(\d)\1{13}$/', $cnpj)) {
            return false;
        }

        // Cálculo dos dígitos verificadores
        $weightsFirst = [5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
        $weightsSecond = [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];

        // Cálculo do primeiro dígito verificador
        for ($i = 0, $sum = 0; $i < 12; $i++) {
            $sum += $cnpj[$i] * $weightsFirst[$i];
        }
        $firstDigit = ($sum % 11) < 2 ? 0 : 11 - ($sum % 11);

        // Cálculo do segundo dígito verificador
        for ($i = 0, $sum = 0; $i < 13; $i++) {
            $sum += $cnpj[$i] * $weightsSecond[$i];
        }
        $secondDigit = ($sum % 11) < 2 ? 0 : 11 - ($sum % 11);

        // Verifica se os dígitos calculados são iguais aos informados no CNPJ
        return $cnpj[12] == $firstDigit && $cnpj[13] == $secondDigit;
    }
}
