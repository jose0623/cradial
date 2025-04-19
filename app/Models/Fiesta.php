<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Fiesta
 *
 * @property $id
 * @property $id_emisora
 * @property $nombre
 * @property $fecha
 * @property $created_at
 * @property $updated_at
 *
 * @property Emisora $emisora
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Fiesta extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_emisora', 'nombre', 'fecha'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function emisora()
    {
        return $this->belongsTo(\App\Models\Emisora::class, 'id_emisora', 'id');
    }
    
}
