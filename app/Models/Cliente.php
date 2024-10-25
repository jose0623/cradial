<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cliente
 *
 * @property $id
 * @property $nombre
 * @property $telefono
 * @property $direccion
 * @property $nit
 * @property $plazo_en_dias
 * @property $vendedor_id
 * @property $email
 * @property $municipio_id
 * @property $fax
 * @property $tipo_de_documento
 * @property $digito_verificacion
 * @property $comun
 * @property $simplificado
 * @property $gca
 * @property $gc
 * @property $tipo_cliente_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Municipio $municipio
 * @property TipoCliente $tipoCliente
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cliente extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nombre', 'telefono', 'direccion', 'nit', 'plazo_en_dias', 'vendedor_id', 'email', 'municipio_id', 'fax', 'tipo_de_documento', 'digito_verificacion', 'comun', 'simplificado', 'gca', 'gc', 'tipo_cliente_id'];


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
    public function tipoCliente()
    {
        return $this->belongsTo(\App\Models\TipoCliente::class, 'tipo_cliente_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'vendedor_id', 'id');
    }
    
}
