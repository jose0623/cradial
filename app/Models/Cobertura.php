<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cobertura
 *
 * @property $id
 * @property $emisora_id
 * @property $municipio_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Emisora $emisora
 * @property Municipio $municipio
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cobertura extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['emisora_id', 'municipio_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function emisora()
    {
        return $this->belongsTo(\App\Models\Emisora::class, 'emisora_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function municipio()
    {
        return $this->belongsTo(\App\Models\Municipio::class, 'municipio_id', 'id');
    }
    
}
