<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmisoraRequest extends FormRequest
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
			'name' => 'required|string',
			'potencia' => 'required|string',
			'dial' => 'required|string',
			'tipo_emisoras_id' => 'required',
			'municipio_id' => 'required',
			'tipo_documento' => 'required',
			'identificacion' => 'required|string',
			'telefono1' => 'string',
			'celular' => 'string',
			'direccion' => 'string',
			'email' => 'string',
			'email2' => 'string',
			'email3' => 'string',
			'utiliza_remoto' => 'required',
			'tiene_real_audio' => 'required',
			'clase_pauta' => 'string',
			'afiliacion_id' => 'required',
			'utiliza_perifoneo' => 'required',
			'web' => 'string',
			'licencia_funcionamiento' => 'string',
			'iva' => 'required',
			'tipo_programa_id' => 'string',
			'nombre_periodico' => 'string',
			'nombre_canal_television' => 'string',
			'gerente' => 'string',
			'telefono_gerente'  => 'string',
			'director_noticias' => 'string',
			'telefono_director_noticias' => 'string',
			'nombre_mejor_locutor' => 'string',
			'operador_telefonia' => 'string',
			'lider_opinion' => 'string',
			'facebook' => 'string',
			'instagram' => 'string',
			'tiktok' => 'string',
			'encargado_pauta' => 'string',
			'telefono_encargado_pauta' => 'string',
			'representante_legal' => 'string',
			'telefono_representante_legal' => 'string',
			'cantidad_minima' => 'string',
			'observaciones' => 'string',
			// --- NUEVAS REGLAS DE VALIDACIÓN ---
            'emisora_activa' => 'required|boolean', // Debe ser booleano y requerido
            'observacion_estado_emisora' => 'nullable|string|max:500', // Texto opcional, máximo 500 caracteres
        ];
    }
}
