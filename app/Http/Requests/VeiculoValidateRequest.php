<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VeiculoValidateRequest extends FormRequest
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
            'placa' => 'required|unique:veiculos,placa',
            'proprietario' => 'required|string|min:3|max:255',
            'modelo' => 'string|min:3|max:250',
            'ano' => 'date',
            'cor' => 'string|min:3',
        ];
    }
}
