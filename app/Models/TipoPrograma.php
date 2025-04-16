<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoPrograma extends Model
{
    protected $table = 'tipo_programas';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ['name'];

    public function emisoras()
    {
        return $this->belongsToMany(Emisora::class, 'emisora_tipo_programa', 'tipo_programa_id', 'id_emisora');
    }
}
