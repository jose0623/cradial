<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Regiones extends Model
{
    use HasFactory;

    protected $table = 'regiones'; // Nombre de la tabla es 'regiones'
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id_emisora',
        'municipio_id',
    ];

    public function emisora(): BelongsTo
    {
        return $this->belongsTo(Emisora::class, 'id_emisora');
    }

    public function municipio(): BelongsTo
    {
        return $this->belongsTo(Municipio::class, 'municipio_id');
    }
}
