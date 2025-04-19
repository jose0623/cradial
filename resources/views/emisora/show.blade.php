@extends('layouts.app')

@section('template_title')
    {{ $emisora->name ?? __('Show') . " " . __('Emisora') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Ver') }} Emisora</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('emisoras.index') }}"> {{ __('Regresar') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre:</strong>
                                    {{ $emisora->name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Potencia:</strong>
                                    {{ $emisora->potencia }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Dial:</strong>
                                    {{ $emisora->dial }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tipo Emisora:</strong>
                                    {{ $emisora->tipoEmisora->name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tipo Documento:</strong>
                                    {{ $emisora->tipo_documento == 1 ? 'NIT' : '' }}
                                    {{ $emisora->tipo_documento == 2 ? 'C.C' : '' }}
                                    {{ $emisora->tipo_documento == 3 ? 'C.E.' : '' }}
                                    {{ $emisora->tipo_documento == 4 ? 'T.I.' : '' }}
                                    {{ $emisora->tipo_documento == 5 ? 'OTRO' : '' }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Identificacion:</strong>
                                    {{ $emisora->identificacion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Municipio:</strong>
                                    {{ $emisora->municipio->name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Direccion:</strong>
                                    {{ $emisora->direccion }}
                                </div>

                                <br>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tiene Real Audio:</strong>
                                    {{ $emisora->tiene_real_audio == 1 ? 'Si' : 'No' }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Real Audio:</strong>
                                    {{ $emisora->real_audio }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Descripcion del Real Audio:</strong>
                                    {{ $emisora->descripcion_real_audio }}
                                </div>


                                <div class="form-group mb-2 mb20">
                                    <strong>Utiliza Remoto:</strong>
                                    {{ $emisora->utiliza_remoto == 1 ? 'Si' : 'No' }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tarifa Remoto:</strong>
                                    {{ $emisora->tarifa_remoto }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tiempo del Remoto:</strong>
                                    {{ $emisora->tiempo_remoto }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Descripcion del Remoto:</strong>
                                    {{ $emisora->descripcion_remoto }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Utiliza Perifoneo:</strong>
                                    {{ $emisora->utiliza_perifoneo == 1 ? 'Si' : 'No' }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tarifa Perifoneo:</strong>
                                    {{ $emisora->tarifa_perifoneo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tiempo del Perifoneo:</strong>
                                    {{ $emisora->tarifa_perifoneo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Descripcion del Perifoneo:</strong>
                                    {{ $emisora->descripcion_perifoneo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Web:</strong>
                                    {{ $emisora->web }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Pauta que no puede emitir la emisora?:</strong>
                                    {{ $emisora->clase_pauta }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Licencia Funcionamiento:</strong>
                                    {{ $emisora->licencia_funcionamiento }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Afiliacion:</strong>
                                    {{ $emisora->tipoAfiliacione->name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Cantidad Minima (Cuñas o valor):</strong>
                                    {{ $emisora->cantidad_minima }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Iva:</strong>
                                    {{ $emisora->iva == 1 ? 'Si' : 'No' }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre Periodico:</strong>
                                    {{ $emisora->nombre_periodico }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre Canal Television:</strong>
                                    {{ $emisora->nombre_canal_television }}
                                </div>

                                <br>

                                <div class="form-group mb-2 mb20">
                                    <strong>Facebook:</strong>
                                    {{ $emisora->facebook }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Instagram:</strong>
                                    {{ $emisora->instagram }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tiktok:</strong>
                                    {{ $emisora->tiktok }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Email:</strong>
                                    {{ $emisora->email }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Email 2:</strong>
                                    {{ $emisora->email2 }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Email 3:</strong>
                                    {{ $emisora->email3 }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Telefono:</strong>
                                    {{ $emisora->telefono1 }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Celular:</strong>
                                    {{ $emisora->celular }}
                                </div>

                                <br>
                                
                               
                                <div class="form-group mb-2 mb20">
                                    <strong>Gerente:</strong>
                                    {{ $emisora->gerente }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Telefono del Gerente:</strong>
                                    {{ $emisora->telefono_gerente }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Director Noticias:</strong>
                                    {{ $emisora->director_noticias }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Telefono del Director Noticias:</strong>
                                    {{ $emisora->telefono_director_noticias }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Encargado de Pauta:</strong>
                                    {{ $emisora->encargado_pauta }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Telefono del Encargado de Pauta:</strong>
                                    {{ $emisora->telefono_encargado_pauta }}
                                </div>

                                <div class="form-group mb-2 mb20">
                                    <strong>Representante Legal:</strong>
                                    {{ $emisora->representante_legal }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Telefono del Representante Legal:</strong>
                                    {{ $emisora->telefono_representante_legal }}
                                </div>

                                <br>
                                
                                <div class="form-group mb-2 mb20">
                                    <strong>Observaciones:</strong>
                                    {{ $emisora->observaciones }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
