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
                            <span class="card-title">{{ __('Show') }} Emisora</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('emisoras.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Name:</strong>
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
                                    <strong>Tipo Emisoras Id:</strong>
                                    {{ $emisora->tipo_emisoras_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Municipio Id:</strong>
                                    {{ $emisora->municipio_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tipo Documento:</strong>
                                    {{ $emisora->tipo_documento }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Identificacion:</strong>
                                    {{ $emisora->identificacion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Telefono1:</strong>
                                    {{ $emisora->telefono1 }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Telefono2:</strong>
                                    {{ $emisora->telefono2 }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Celular:</strong>
                                    {{ $emisora->celular }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Direccion:</strong>
                                    {{ $emisora->direccion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Email:</strong>
                                    {{ $emisora->email }}
                                </div>

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
                                    <strong>Utiliza Remoto:</strong>
                                    {{ $emisora->utiliza_remoto }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tiene Real Audio:</strong>
                                    {{ $emisora->tiene_real_audio }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Clase Pauta:</strong>
                                    {{ $emisora->clase_pauta }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Afiliacion Id:</strong>
                                    {{ $emisora->afiliacion_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Utiliza Perifoneo:</strong>
                                    {{ $emisora->utiliza_perifoneo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Web:</strong>
                                    {{ $emisora->web }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Licencia Funcionamiento:</strong>
                                    {{ $emisora->licencia_funcionamiento }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Valor Costo Cuña 30s:</strong>
                                    {{ $emisora->valor_costo }}
                                </div>
                                
                                <div class="form-group mb-2 mb20">
                                    <strong>Cantidad Maxima Cuñas:</strong>
                                    {{ $emisora->cantidad_maxima_cuñas }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tarifa Remoto:</strong>
                                    {{ $emisora->tarifa_remoto }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Iva:</strong>
                                    {{ $emisora->iva }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Porcentaje Descuento:</strong>
                                    {{ $emisora->porcentaje_descuento }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tarifa Perifoneo:</strong>
                                    {{ $emisora->tarifa_perifoneo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre Programa:</strong>
                                    {{ $emisora->nombre_programa }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tipo Programa Id:</strong>
                                    {{ $emisora->tipo_programa_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Rating:</strong>
                                    {{ $emisora->rating }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Programa Mayor Audiencia:</strong>
                                    {{ $emisora->programa_mayor_audiencia }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre Periodico:</strong>
                                    {{ $emisora->nombre_periodico }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre Canal Television:</strong>
                                    {{ $emisora->nombre_canal_television }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Horario:</strong>
                                    {{ $emisora->horario }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Gerente:</strong>
                                    {{ $emisora->gerente }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Director Noticias:</strong>
                                    {{ $emisora->director_noticias }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre Mejor Locutor:</strong>
                                    {{ $emisora->nombre_mejor_locutor }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Operador Telefonia:</strong>
                                    {{ $emisora->operador_telefonia }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Lider Opinion:</strong>
                                    {{ $emisora->lider_opinion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Login:</strong>
                                    {{ $emisora->login }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Estado:</strong>
                                    {{ $emisora->estado }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Plataforma:</strong>
                                    {{ $emisora->plataforma }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
