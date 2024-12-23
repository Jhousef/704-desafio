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
        // ,{$veiculo->id}
        // $veiculo
        return [
            'placa' => [
                "required",
                "unique:veiculos,placa",
                'regex:/^[A-Z]{3}-[0-9]{4}$|^[A-Z]{3}[0-9]{1}[A-Z]{1}[0-9]{2}$/i'
            ],
            'proprietario' => 'required|string|min:3|max:255',
            'modelo' => 'string|min:3|max:250',
            'ano' => 'date',
            'cor' => 'string|min:3',
        ];
    }

    public function messages(): array
    {
        return [
            'placa.regex' => 'O formato do campo placa precisa seguir os padrões: ABC1D23 ou ABC-1234',
        ];
    }
}
