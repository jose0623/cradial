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
                            <span class="card-title">{{ __('Ver') }} Emisora Programa</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('emisora.programas.index', ['id_emisora' =>  $emisoraPrograma->id_emisora  ] ) }}"> {{ __('Regresar') }}</a>
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
                        <div class="form-group mb-2 mb20">
                            <strong>Costo Actual:</strong>
                            {{ $emisoraPrograma->costo }}
                        </div>

                        <div class="mt-4">
                            <h5>Historial de Precios (Últimos 10)</h5>
                            @if ($historialCostos->count() > 0)
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Costo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($historialCostos as $costo)
                                            <tr>
                                                <td>{{ $costo->fecha }}</td>
                                                <td>{{ $costo->costo }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p>No hay historial de precios disponible para este programa.</p>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection