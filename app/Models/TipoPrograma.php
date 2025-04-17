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
        // tipo_programa_id: FK de TipoPrograma en la tabla pivote
        // id_emisora: FK de Emisora en la tabla pivote
    }
}
