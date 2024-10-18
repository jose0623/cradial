<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cobertura extends Model
{
    use HasFactory;

    protected $fillable = [
        'emisora_id',
        'estado_id',
        'municipio_id',
        'cobertura',
    ];

    // Relaciones
    public function emisora()
    {
        return $this->belongsTo(Emisora::class);
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }

    public function municipio()
    {
        return $this->belongsTo(Municipio::class);
    }
}