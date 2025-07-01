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
                        <div class="mb-3">
                            <h4><strong>Número de reporte:</strong> {{ $reporte->id }}-{{ $reporte->codigo_propuesta }}</h4>
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
                                    <strong>Total:</strong>
                                    {{ $reporte->total }}
                                </div>

                                @php
                                    $subtotal_general = $reporte->reporteItems->sum('precio_base');
                                    $iva_general = $reporte->reporteItems->sum('valor_iva');
                                    $total_general = $reporte->reporteItems->sum('valor_total_con_iva');
                                @endphp
                                <div class="alert alert-info mt-3">
                                    <h5>Resumen Fiscal</h5>
                                    <ul>
                                        <li><strong>Subtotal general:</strong> {{ number_format($subtotal_general, 2) }}</li>
                                        <li><strong>IVA general:</strong> {{ number_format($iva_general, 2) }}</li>
                                        <li><strong>Total general con IVA:</strong> {{ number_format($total_general, 2) }}</li>
                                    </ul>
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
