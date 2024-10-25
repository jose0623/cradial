<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regiones extends Model
{
    use HasFactory;

    protected $fillable = [
        'emisora_id',
        'municipio_id',
    ];

    public function emisora()
    {
        return $this->belongsTo(Emisora::class);
    }

    public function municipio()
    {
        return $this->belongsTo(Municipio::class);
    }
}


