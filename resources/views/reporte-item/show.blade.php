@extends('layouts.app')

@section('template_title')
    {{ $reporteItem->name ?? __('Show') . " " . __('Reporte Item') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <br>
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="" style="text-align: left">

                            <b>Reporte N: </b> {{ $id_reporte }} 
                            <br>
                            <b> Vigencia desde: </b> <span style="color: red"> {{ $vigencia_desde }} </span> 
                            --
                            <b> hasta: </b> <span style="color: red"> {{ $vigencia_hasta  }} </span>
                            
                            <br>
                            <b> SubTotal : </b> <span style="color: red"> {{ $subtotal  }} </span>
                            --
                            <b> Total : </b> <span style="color: red"> {{ $total  }} </span>
                            
                        </div>

                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('reporte-items.index') }}"> {{ __('Regresar') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                
                                <div class="form-group mb-2 mb20">
                                    <strong>Emisora:</strong>
                                    {{ $reporteItem->emisora->name }}
                                </div>
                                
                                <div class="form-group mb-2 mb20">
                                    <strong>Direccion de Emisora:</strong>
                                    {{ $direccionEmisora }} <b> Municipio: </b> {{ $municipioEmisora }}  <b>Departamento:</b> {{ $estadoEmisora }}
                                </div>
                                <strong>Cobertura de la Emisora:</strong>
                                @if ($municipiosCobertura->isNotEmpty())
                                    <ul>
                                        @foreach ($municipiosCobertura->groupBy('estado.name') as $estado => $municipios)
                                            <li>
                                                <strong>{{ $estado }}</strong>
                                                <ul>
                                                    <li>
                                                    
                                                    @foreach ($municipios as $municipio)
                                                            {{ $municipio->name }}, 
                                                    @endforeach
                                                    </li>
                                                </ul>
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p>Esta emisora no tiene cobertura registrada en otras regiones.</p>
                                @endif
                        

                                <div class="form-group mb-2 mb20">
                                    <strong>Programa:</strong>
                                    {{ $reporteItem->programa->nombre_programa }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Locutor:</strong>
                                    {{ $reporteItem->programa->nombre_locutor }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tipo de Pauta:</strong>
                                    {{ $reporteItem->tipo_cuna == 1 ? 'Cuña' : ($reporteItem->tipo_cuna == 2 ? 'Mención' : $reporteItem->tipo_cuna) }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Duracion:</strong>
                                    @if ($reporteItem->duracion == '30%' )
                                    5s
                                @elseif ($reporteItem->duracion == '50%' )
                                    10s
                                @elseif ($reporteItem->duracion == '60%' )
                                    15s
                                @elseif ($reporteItem->duracion == '75%' )
                                    20s
                                @elseif ($reporteItem->duracion == '85%' )
                                    25s
                                @elseif ($reporteItem->duracion == '100%' )
                                    30s
                                @elseif ($reporteItem->duracion == '120%' )
                                    35s
                                @elseif ($reporteItem->duracion == '133%' )
                                    40s
                                @elseif ($reporteItem->duracion == '150%' )
                                    45s
                                @elseif ($reporteItem->duracion == '170%' )
                                    50s
                                @elseif ($reporteItem->duracion == '185%' )
                                    55s
                                @elseif ($reporteItem->duracion == '200%' )
                                    1min
                                @else
                                {{ $reporteItem->duracion }} {{-- Muestra el valor original --}}
                                @endif
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Dias Emision:</strong>
                                    <small>
                                        {{ $reporteItem->programa->lunes == 1 ? 'LU' : '' }}
                                        {{ $reporteItem->programa->martes == 1 ? 'MA' : '' }}
                                        {{ $reporteItem->programa->miercoles == 1 ? 'MI' : '' }}
                                        {{ $reporteItem->programa->jueves == 1 ? 'JU' : '' }}
                                        {{ $reporteItem->programa->viernes == 1 ? 'VI' : '' }}
                                        {{ $reporteItem->programa->sabado == 1 ? 'SA' : '' }}
                                        {{ $reporteItem->programa->domingo == 1 ? 'DO' : '' }}
                                    </small>
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Horario:</strong>
                                    {{ $reporteItem->horario }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Cantidad Dias:</strong>
                                    {{ $reporteItem->cantidad_dias }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Cunas Por Dia:</strong>
                                    {{ $reporteItem->cunas_por_dia }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Precio Base:</strong>
                                    {{ $reporteItem->programa->costo }} | {{ $reporteItem->programa->venta }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Bonificacion:</strong>
                                    {{ $reporteItem->bonificacion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Valor Unitario:</strong>
                                    {{ $reporteItem->valor_unitario }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Descuento:</strong>
                                    {{ $reporteItem->descuento }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Valor Total:</strong>
                                    {{ $reporteItem->valor_neto }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
