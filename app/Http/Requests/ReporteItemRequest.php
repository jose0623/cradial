<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReporteItemRequest extends FormRequest
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
            'reporte_id' => 'required',
			'id_emisora' => 'required',
			'programa_id' => 'required',
			'tipo_cuna' => 'required',
			'duracion' => 'required|string',
			'horario' => 'required|string',
			'cantidad_dias' => 'required',
			'cunas_por_dia' => 'required',
			'bonificacion' => 'required',
			'valor_unitario' => 'required',
			'descuento' => 'required',
			'valor_neto' => 'required',
            'cunas_por_dia_detalle' => 'nullable',
            'precio_base' => 'nullable',
            'precio_venta' => 'nullable',
            'tipo_programa_id' => 'nullable',
            'factor_duracion' => 'nullable',
            'recargo_noticiero' => 'nullable',
            'recargo_mencion' => 'nullable',
            'iva_aplicado' => 'nullable',
            'valor_iva' => 'nullable',
            'valor_total_con_iva' => 'nullable',
            'usuario_creador_id' => 'nullable',
        ];
    }
}
