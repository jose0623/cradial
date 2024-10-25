<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'estado_id'];

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }

    public function regiones()
    {
        return $this->hasMany(Regiones::class);
    }
}