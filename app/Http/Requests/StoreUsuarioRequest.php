<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsuarioRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'direccion' => 'nullable|string|max:255',
            'dni' => 'required|string|max:20|unique:usuarios,dni',
            'fechaNacimiento' => 'nullable|date',
            'email' => 'required|email|unique:usuarios,email',
            'telefono' => 'nullable|string|max:20',
            'usuario' => 'required|string|max:50|unique:usuarios,usuario',
            'pass' => 'required|string|min:6',
            'seccion' => 'nullable|integer',
            'junta' => 'nullable|integer',
            'atributo' => 'nullable|integer',
        ];
    }
}
