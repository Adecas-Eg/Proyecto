<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCasa extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255|min:2',
            'tipo_oferta' =>'required|max:255',
            'tipo_inmueble' => 'required|max:255',
            'estrato' => 'required|max:255',
            'direccion' => 'required|max:255',
            'departamento' => 'required|max:255',
            'ciudad' => 'required|max:255',
            'descripcion' => 'required|max:255',
            'baños' => 'required|max:255',
            'parqueaderos' => 'required|max:255',
            'pisos' => 'required|max:255'
        ];
    }
}
