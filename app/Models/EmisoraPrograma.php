<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmisoraPrograma extends Model
{
    protected $table = 'emisora_programas';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id_emisora',
        'nombre_programa',
        'tipo_programa_id',
        'lunes',
        'martes',
        'miercoles',
        'jueves',
        'viernes',
        'sabado',
        'domingo',
        'horario',
        'nombre_locutor',
        'activo',
        'costo',
        'venta'
    ];

    public function emisora()
    {
        return $this->belongsTo(Emisora::class, 'id_emisora');
    }

    public function tipoPrograma()
    {
        return $this->belongsTo(TipoPrograma::class, 'tipo_programa_id');
    }
}
