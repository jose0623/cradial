<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cobertura extends Model
{
    protected $table = 'coberturas';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ['id_emisora', 'municipio_id'];

    public function emisora()
    {
        return $this->belongsTo(Emisora::class, 'id_emisora');
    }

    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'municipio_id');
    }
}
