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
        'municipio_id',
        'tipo_documento',
        'identificacion',
        'telefono1',
        'telefono2',
        'celular',
        'direccion',
        'email',
        'utiliza_remoto',
        'tiene_real_audio',
        'clase_pauta',
        'afiliacion_id',
        'utiliza_perifoneo',
        'web',
        'licencia_funcionamiento',
        'cantidad_maxima_cuñas',
        'tarifa_remoto',
        'iva',
        'porcentaje_descuento',
        'tarifa_perifoneo',
        'nombre_programa',
        'tipo_programa_id',
        'rating',
        'programa_mayor_audiencia',
        'nombre_periodico',
        'nombre_canal_television',
        'horario',
        'gerente',
        'director_noticias',
        'nombre_mejor_locutor',
        'operador_telefonia',
        'lider_opinion',
        'login',
        'password',
        'estado',
        'plataforma',
        'facebook',
        'instagram',
        'tiktok',
        'valor_costo'
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
