<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Reporte
 *
 * @property $id
 * @property $cliente_id
 * @property $titulo
 * @property $estado
 * @property $es_propuesta
 * @property $codigo_propuesta
 * @property $vigencia_desde
 * @property $vigencia_hasta
 * @property $observaciones
 * @property $total
 * @property $created_at
 * @property $updated_at
 *
 * @property Cliente $cliente
 * @property ReporteItem[] $reporteItems
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Reporte extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['cliente_id', 'titulo', 'estado', 'es_propuesta', 'codigo_propuesta', 'vigencia_desde', 'vigencia_hasta', 'observaciones', 'total'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cliente()
    {
        return $this->belongsTo(\App\Models\Cliente::class, 'cliente_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reporteItems()
    {
        return $this->hasMany(\App\Models\ReporteItem::class, 'reporte_id', 'id');
    }
    
    /**
     * Recalcula el total sumando valor_total_con_iva de los items asociados
     */
    public function recalcularTotal()
    {
        $total = $this->reporteItems()->sum('valor_total_con_iva');
        $this->total = $total;
        $this->save();
    }
}
