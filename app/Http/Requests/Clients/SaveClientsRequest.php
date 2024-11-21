<?php

namespace App\Http\Requests\Clients;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveClientsRequest extends FormRequest
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
            'ruc' => ["required", "string", "size:11", Rule::unique('clients')],
            'email' => ["required", "string", "email", "max:255", Rule::unique('clients')],
            'compname' => ["required", "string", "max:255"],
            'direction' => ["required", "string", "max:255"],
            'phone' => ["required", "string", "max:20"]
        ];
    }

    public function messages(): array
    {
        return [
            'ruc.required' => 'El ruc es requerido',
            'ruc.size' => 'El ruc debe tener 11 carácteres',
            'ruc.numeric' => 'El ruc debe ser numérico',
            'ruc.unique' => 'El ruc debe ser único',
            'email.required' => 'El email es requerido',
            'email.max' => 'El email debe tener como máximo 255 carácteres',
            'email.email' => 'El email no es válido',
            'email.unique' => 'El email debe ser único',
            'compname.required' => 'La razón social es requerida',
            'compname.max' => 'La razón social debe tener como máximo 255 carácteres',
            'direction.required' => 'La dirección es requerida',
            'direction.max' => 'La dirección debe tener como máximo 255 carácteres',
            'phone.required' => 'El celular es requerido',
            'phone.max' => 'El celular debe tener como máximo 20 carácteres',
        ];
    }
}
