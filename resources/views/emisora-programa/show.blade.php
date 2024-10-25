@extends('layouts.app')

@section('template_title')
    {{ $emisoraPrograma->name ?? __('Show') . " " . __('Emisora Programa') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Emisora Programa</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('emisora.programas.index', ['id_emisora' =>  $emisoraPrograma->id_emisora  ] ) }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Emisora:</strong>
                                    {{ $emisoraPrograma->id_emisora }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre Programa:</strong>
                                    {{ $emisoraPrograma->nombre_programa }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tipo Programa Id:</strong>
                                    {{ $emisoraPrograma->tipo_programa_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Lunes:</strong>
                                    {{ $emisoraPrograma->lunes }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Martes:</strong>
                                    {{ $emisoraPrograma->martes }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Miercoles:</strong>
                                    {{ $emisoraPrograma->miercoles }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Jueves:</strong>
                                    {{ $emisoraPrograma->jueves }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Viernes:</strong>
                                    {{ $emisoraPrograma->viernes }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Sabado:</strong>
                                    {{ $emisoraPrograma->sabado }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Domingo:</strong>
                                    {{ $emisoraPrograma->domingo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Horario:</strong>
                                    {{ $emisoraPrograma->horario }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre Locutor:</strong>
                                    {{ $emisoraPrograma->nombre_locutor }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Activo:</strong>
                                    {{ $emisoraPrograma->activo }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
