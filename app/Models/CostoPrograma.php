<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CostoPrograma extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_programa',
        'costo',
        'fecha',
    ];

    public function programa(): BelongsTo
    {
        return $this->belongsTo(EmisoraPrograma::class, 'id_programa');
    }
}