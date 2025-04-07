<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EmisoraPrograma
 *
 * @property $id
 * @property $id_emisora
 * @property $nombre_programa
 * @property $tipo_programa_id
 * @property $lunes
 * @property $martes
 * @property $miercoles
 * @property $jueves
 * @property $viernes
 * @property $sabado
 * @property $domingo
 * @property $horario
 * @property $nombre_locutor
 * @property $activo
 * @property $created_at
 * @property $updated_at
 *
 * @property Emisora $emisora
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class EmisoraPrograma extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     */
    protected $fillable = ['id_emisora', 'nombre_programa', 'tipo_programa_id', 'lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo', 'horario', 'nombre_locutor', 'activo', 'costo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function emisora()
    {
        return $this->belongsTo(\App\Models\Emisora::class, 'id_emisora', 'id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipoprograma()
    {
        return $this->belongsTo(\App\Models\tipoprograma::class, 'tipo_programa_id', 'id');
    }
    
}
