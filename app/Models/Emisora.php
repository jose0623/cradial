<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Emisora
 *
 * @property $id
 * @property $name
 * @property $potencia
 * @property $dial
 * @property $tipo_emisoras_id
 * @property $municipio_id
 * @property $tipo_documento
 * @property $identificacion
 * @property $telefono1
 * @property $telefono2
 * @property $celular
 * @property $direccion
 * @property $correo_fisico
 * @property $email
 * @property $utiliza_remoto
 * @property $tiene_real_audio
 * @property $clase_pauta
 * @property $afiliacion_id
 * @property $utiliza_perifoneo
 * @property $web
 * @property $licencia_funcionamiento
 * @property $idioma
 * @property $cantidad_maxima_cuñas
 * @property $tarifa_remoto
 * @property $iva
 * @property $porcentaje_descuento
 * @property $tarifa_perifoneo
 * @property $nombre_programa
 * @property $tipo_programa_id
 * @property $rating
 * @property $programa_mayor_audiencia
 * @property $nombre_periodico
 * @property $nombre_canal_television
 * @property $horario
 * @property $gerente
 * @property $director_noticias
 * @property $nombre_mejor_locutor
 * @property $operador_telefonia
 * @property $lider_opinion
 * @property $login
 * @property $password
 * @property $estado
 * @property $plataforma
 * @property $created_at
 * @property $updated_at
 *
 * @property TipoAfiliacione $tipoAfiliacione
 * @property Municipio $municipio
 * @property TipoEmisora $tipoEmisora
 * @property TipoPrograma $tipoPrograma
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Emisora extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'potencia', 'dial', 'tipo_emisoras_id', 'municipio_id', 'tipo_documento', 'identificacion', 'telefono1', 'telefono2', 'celular', 'direccion', 'correo_fisico', 'email', 'utiliza_remoto', 'tiene_real_audio', 'clase_pauta', 'afiliacion_id', 'utiliza_perifoneo', 'web', 'licencia_funcionamiento', 'idioma', 'cantidad_maxima_cuñas', 'tarifa_remoto', 'iva', 'porcentaje_descuento', 'tarifa_perifoneo', 'nombre_programa', 'tipo_programa_id', 'rating', 'programa_mayor_audiencia', 'nombre_periodico', 'nombre_canal_television', 'horario', 'gerente', 'director_noticias', 'nombre_mejor_locutor', 'operador_telefonia', 'lider_opinion', 'login', 'estado', 'plataforma'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipoAfiliacione()
    {
        return $this->belongsTo(\App\Models\TipoAfiliacione::class, 'afiliacion_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function municipio()
    {
        return $this->belongsTo(\App\Models\Municipio::class, 'municipio_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipoEmisora()
    {
        return $this->belongsTo(\App\Models\TipoEmisora::class, 'tipo_emisoras_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipoPrograma()
    {
        return $this->belongsTo(\App\Models\TipoPrograma::class, 'tipo_programa_id', 'id');
    }
    
    public function regiones()
    {
        return $this->hasMany(Regiones::class);
    }
    
}
