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
			'telefono1' => 'required|string',
			'celular' => 'required|string',
			'direccion' => 'required|string',
			'email' => 'required|string',
			'afiliacion_id' => 'required',
			'iva' => 'required',
			'encargado_pauta' => 'required|string',
			'telefono_encargado_pauta' => 'required|string',
			'gerente' => 'required|string',
			'telefono_gerente'  => 'required|string',
			'director_noticias' => 'required|string',
			'telefono_director_noticias' => 'required|string',
			'emisora_activa' => 'required|boolean',

			// Los demás campos quedan como opcionales
			'email2' => 'nullable|string',
			'email3' => 'nullable|string',
			'utiliza_remoto' => 'nullable',
			'tiene_real_audio' => 'nullable',
			'clase_pauta' => 'nullable|string',
			'utiliza_perifoneo' => 'nullable',
			'web' => 'nullable|string',
			'licencia_funcionamiento' => 'nullable|string',
			'tipo_programa_id' => 'nullable|string',
			'nombre_periodico' => 'nullable|string',
			'nombre_canal_television' => 'nullable|string',
			'nombre_mejor_locutor' => 'nullable|string',
			'operador_telefonia' => 'nullable|string',
			'lider_opinion' => 'nullable|string',
			'facebook' => 'nullable|string',
			'instagram' => 'nullable|string',
			'tiktok' => 'nullable|string',
			'representante_legal' => 'nullable|string',
			'telefono_representante_legal' => 'nullable|string',
			'cantidad_minima' => 'nullable|string',
			'observaciones' => 'nullable|string',
			'observacion_estado_emisora' => 'nullable|string|max:500',
        ];
    }
}
