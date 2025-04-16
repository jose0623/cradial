<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Estado
 *
 * @property $id
 * @property $name
 * @property $pais_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Paise $paise
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Estado extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'pais_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paise()
    {
        return $this->belongsTo(\App\Models\Paise::class, 'pais_id', 'id');
    }

    public function municipios()
    {
        return $this->hasMany(Municipio::class);
    }
    
}
