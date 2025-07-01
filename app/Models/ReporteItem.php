<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ReporteItem
 *
 * @property $id
 * @property $reporte_id
 * @property $id_emisora
 * @property $programa_id
 * @property $tipo_cuna
 * @property $duracion
 * @property $dias_emision
 * @property $horario
 * @property $cantidad_dias
 * @property $cunas_por_dia
 * @property $bonificacion
 * @property $valor_unitario
 * @property $descuento
 * @property $valor_neto
 * @property $created_at
 * @property $updated_at
 *
 * @property Emisora $emisora
 * @property EmisoraPrograma $emisoraPrograma
 * @property Reporte $reporte
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ReporteItem extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'reporte_id',
        'id_emisora',
        'programa_id',
        'tipo_cuna',
        'duracion',
        'dias_emision',
        'horario',
        'cantidad_dias',
        'cunas_por_dia',
        'bonificacion',
        'valor_unitario',
        'descuento',
        'valor_neto',
        'cunas_por_dia_detalle',
        'precio_base',
        'precio_venta',
        'tipo_programa_id',
        'factor_duracion',
        'recargo_noticiero',
        'recargo_mencion',
        'iva_aplicado',
        'valor_iva',
        'valor_total_con_iva',
        'usuario_creador_id',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function emisora()
    {
        return $this->belongsTo(\App\Models\Emisora::class, 'id_emisora', 'id');
    }

    public function programa()
    {
        return $this->belongsTo(EmisoraPrograma::class, 'programa_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function emisoraPrograma()
    {
        return $this->belongsTo(\App\Models\EmisoraPrograma::class, 'programa_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reporte()
    {
        return $this->belongsTo(\App\Models\Reporte::class, 'reporte_id', 'id');
    }
    
}
