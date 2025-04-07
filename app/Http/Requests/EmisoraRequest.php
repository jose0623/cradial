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
			'telefono2' => 'string',
			'celular' => 'string',
			'direccion' => 'string',
			'email' => 'string',
			'utiliza_remoto' => 'required',
			'tiene_real_audio' => 'required',
			'clase_pauta' => 'string',
			'afiliacion_id' => 'required',
			'utiliza_perifoneo' => 'required',
			'web' => 'string',
			'licencia_funcionamiento' => 'string',
			'iva' => 'required',
			'tarifa_perifoneo' => 'string',
			'nombre_programa' => 'string',
			'tipo_programa_id' => 'string',
			'programa_mayor_audiencia' => 'string',
			'nombre_periodico' => 'string',
			'nombre_canal_television' => 'string',
			'horario' => 'string',
			'gerente' => 'string',
			'director_noticias' => 'string',
			'nombre_mejor_locutor' => 'string',
			'operador_telefonia' => 'string',
			'lider_opinion' => 'string',
			'login' => 'required|string',
			'password' => 'required|string',
			'estado' => 'required',
			'plataforma' => 'string',
			'facebook' => 'string',
			'instagram' => 'string',
			'tiktok' => 'string',
			'porcentaje_descuento' => 'string',
			'cantidad_maxima_cuñas' => 'string',
			'tarifa_remoto' => 'string',
			'valor_costo' => 'required',

        ];
    }
}
