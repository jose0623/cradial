<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emisora extends Model
{
    protected $table = 'emisoras'; // Especifica el nombre de la tabla
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'potencia',
        'dial',
        'tipo_emisoras_id',
        'tipo_documento',
        'identificacion',
        'municipio_id',
        'direccion',
        'tiene_real_audio',
        'real_audio',
        'descripcion_real_audio',
        'utiliza_remoto',
        'tarifa_remoto',
        'tiempo_remoto',
        'descripcion_remoto',
        'utiliza_perifoneo',
        'tarifa_perifoneo',
        'tiempo_perifoneo',
        'descripcion_perifoneo',
        'web',
        'clase_pauta',
        'licencia_funcionamiento',
        'afiliacion_id',
        'iva',
        'nombre_periodico',
        'nombre_canal_television',
        'facebook',
        'instagram',
        'tiktok',
        'email',
        'email2',
        'email3',
        'telefono1',
        'celular',
        'gerente',
        'cantidad_minima',
        'telefono_gerente',
        'director_noticias',
        'telefono_director_noticias',
        'encargado_pauta',
        'telefono_encargado_pauta',
        'representante_legal',
        'telefono_representante_legal',
        'observaciones',
    ];

    // Relación con Municipio
    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'municipio_id');
    }

    // Relación con TipoPrograma
    public function tiposPrograma()
    {
        return $this->belongsToMany(TipoPrograma::class, 'emisora_tipo_programa');
    }

     //Relacion con EmisoraPrograma
     public function emisoraProgramas()
    {
        return $this->hasMany(EmisoraPrograma::class);
    }
    // Relación con TipoAfiliacione (si la usas)
    public function tipoAfiliacione()
    {
        return $this->belongsTo(TipoAfiliacione::class, 'afiliacion_id');
    }

    // Relación con TipoEmisora (si la usas)
    public function tipoEmisora()
    {
        return $this->belongsTo(TipoEmisora::class, 'tipo_emisoras_id');
    }
    
}
