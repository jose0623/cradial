<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmisoraProgramaRequest extends FormRequest
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
   

    public function rules()
    {
    return [
            'id_emisora' => 'required',
            'nombre_programa' => 'required|string|max:255',
            'tipo_programa_id' => 'required|exists:tipo_programas,id',
            'horario' => 'required|string',
            'nombre_locutor' => 'required|string',
            'activo' => 'required',
            'costo' => 'required',
            'lunes' => 'nullable|boolean',
            'martes' => 'nullable|boolean',
            'miercoles' => 'nullable|boolean',
            'jueves' => 'nullable|boolean',
            'viernes' => 'nullable|boolean',
            'sabado' => 'nullable|boolean',
            'domingo' => 'nullable|boolean',
        ];
    }
}
