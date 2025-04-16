@extends('layouts.app')

@section('template_title')
    {{ $reporte->name ?? __('Show') . " " . __('Reporte') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Ver') }} Reporte</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('reportes.index') }}"> {{ __('Regresar') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">

                                <div class="form-group mb-2 mb20">
                                    <strong>Codigo Propuesta:</strong>
                                    {{ $reporte->id }}-{{ $reporte->codigo_propuesta }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Cliente:</strong>
                                    {{ $reporte->cliente->nombre ?? 'N/A' }} {{-- Access the client's name --}}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Referencia:</strong>
                                    {{ $reporte->titulo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Estado de la Propuesta:</strong>
                                    {{ $reporte->estado }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Producto del cliente relacionado:</strong>
                                    {{ $reporte->es_propuesta }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Vigencia Desde:</strong>
                                    {{ $reporte->vigencia_desde }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Vigencia Hasta:</strong>
                                    {{ $reporte->vigencia_hasta }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Observaciones:</strong>
                                    {{ $reporte->observaciones }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Subtotal:</strong>
                                    {{ $reporte->subtotal }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Iva:</strong>
                                    {{ $reporte->iva }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Total:</strong>
                                    {{ $reporte->total }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
