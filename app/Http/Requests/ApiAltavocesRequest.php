<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApiAltavocesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; //ESTA AUTORIZACION SIRVE PARA CUANDO VAYA A HACER MODIFICACIONES A LA BASE DE DATOS
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'precio' => 'required',
            'modelo' => 'required',
            'marca' => 'required',
            'foto' => 'required',
            'descripcion' => 'required'
        ];
    }
}
