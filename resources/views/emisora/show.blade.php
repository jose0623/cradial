@extends('layouts.app')

@section('template_title')
    {{ $emisora->name ?? __('Ver') . ' ' . __('Emisora') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <br>
                <div class="card">
                    <div class="card-header justify-content-between align-items-center">
                        <span class="card-title">{{ __('Ver') }} Emisora</span>
                        <div class="float-right">
                            <div class="btn-group">
                                <div class="d-flex justify-content-between mb-3">
                                    <a class="btn btnbr btn-primary btn-sm" href="{{ route('emisoras.index') }}"> {{ __('Regresar') }}</a>
                                    &nbsp;
                                    <a href="{{ route('emisoras.reporte.excel', $emisora->id) }}" target="_blank" rel="noopener noreferrer">
                                        <button class="btn btn-success btn-sm">
                                            <i class="fa fa-file-excel"></i> Excel
                                        </button>
                                    </a>
                                    &nbsp;
                                    <a href="{{ route('emisoras.reporte.pdf', $emisora->id) }}" target="_blank" rel="noopener noreferrer">
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-file-pdf"></i> PDF
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                            

                    <div class="card-body bg-white">
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <strong>Nombre:</strong>
                                <div>{{ $emisora->name }}</div>
                            </div>
                            <div class="col-md-3">
                                <strong>Potencia:</strong>
                                <div>{{ $emisora->potencia }}</div>
                            </div>
                            <div class="col-md-3">
                                <strong>Dial:</strong>
                                <div>{{ $emisora->dial }}</div>
                            </div>
                            <div class="col-md-3">
                                <strong>Tipo Emisora:</strong>
                                <div>{{ $emisora->tipoEmisora->name }}</div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <strong>Tipo Documento:</strong>
                                <div>
                                    @if ($emisora->tipo_documento == 1) NIT @endif
                                    @if ($emisora->tipo_documento == 2) C.C @endif
                                    @if ($emisora->tipo_documento == 3) C.E. @endif
                                    @if ($emisora->tipo_documento == 4) T.I. @endif
                                    @if ($emisora->tipo_documento == 5) OTRO @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <strong>Identificacion:</strong>
                                <div>{{ $emisora->identificacion }}</div>
                            </div>
                            <div class="col-md-3">
                                <strong>Municipio:</strong>
                                <div>{{ $emisora->municipio->name }}</div>
                            </div>
                            <div class="col-md-3">
                                <strong>Direccion:</strong>
                                <div>{{ $emisora->direccion }}</div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <h4><b> Caracteristicas </b></h4>
                        <br>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <strong>Tiene Real Audio:</strong>
                                <div>{{ $emisora->tiene_real_audio == 1 ? 'Si' : 'No' }}</div>
                            </div>
                            <div class="col-md-3">
                                <strong>Real Audio:</strong>
                                <div>{{ $emisora->real_audio }}</div>
                            </div>
                            <div class="col-md-6">
                                <strong>Descripcion del Real Audio:</strong>
                                <div>{{ $emisora->descripcion_real_audio }}</div>
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <strong>Utiliza Remoto:</strong>
                                <div>{{ $emisora->utiliza_remoto == 1 ? 'Si' : 'No' }}</div>
                            </div>
                            <div class="col-md-3">
                                <strong>Tarifa Remoto:</strong>
                                <div>{{ $emisora->tarifa_remoto }}</div>
                            </div>
                            <div class="col-md-3">
                                <strong>Tiempo del Remoto:</strong>
                                <div>{{ $emisora->tiempo_remoto }}</div>
                            </div>
                            <div class="col-md-3">
                                <strong>Descripcion del Remoto:</strong>
                                <div>{{ $emisora->descripcion_remoto }}</div>
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <strong>Utiliza Perifoneo:</strong>
                                <div>{{ $emisora->utiliza_perifoneo == 1 ? 'Si' : 'No' }}</div>
                            </div>
                            <div class="col-md-3">
                                <strong>Tarifa Perifoneo:</strong>
                                <div>{{ $emisora->tarifa_perifoneo }}</div>
                            </div>
                            <div class="col-md-3">
                                <strong>Tiempo del Perifoneo:</strong>
                                <div>{{ $emisora->tiempo_perifoneo }}</div>
                            </div>
                            <div class="col-md-3">
                                <strong>Descripcion del Perifoneo:</strong>
                                <div>{{ $emisora->descripcion_perifoneo }}</div>
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <strong>Web:</strong>
                                <div>{{ $emisora->web }}</div>
                            </div>
                            <div class="col-md-3">
                                <strong>Pauta que no puede emitir la emisora?:</strong>
                                <div>{{ $emisora->clase_pauta }}</div>
                            </div>
                            <div class="col-md-3">
                                <strong>Licencia Funcionamiento:</strong>
                                <div>{{ $emisora->licencia_funcionamiento }}</div>
                            </div>
                            <div class="col-md-3">
                                <strong>Afiliacion:</strong>
                                <div>{{ $emisora->tipoAfiliacione->name }}</div>
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <strong>Cantidad Minima (Cuñas o valor):</strong>
                                <div>{{ $emisora->cantidad_minima }}</div>
                            </div>
                            <div class="col-md-3">
                                <strong>Iva:</strong>
                                <div>{{ $emisora->iva == 1 ? 'Si' : 'No' }}</div>
                            </div>
                            <div class="col-md-3">
                                <strong>Nombre Periodico:</strong>
                                <div>{{ $emisora->nombre_periodico }}</div>
                            </div>
                            <div class="col-md-3">
                                <strong>Nombre Canal Television:</strong>
                                <div>{{ $emisora->nombre_canal_television }}</div>
                            </div>
                        </div>

                        <hr class="my-4">
                        <h4><b> Contactos: </b></h4>
                        <br>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <strong>Facebook:</strong>
                                <div>{{ $emisora->facebook }}</div>
                            </div>
                            <div class="col-md-3">
                                <strong>Instagram:</strong>
                                <div>{{ $emisora->instagram }}</div>
                            </div>
                            <div class="col-md-3">
                                <strong>Tiktok:</strong>
                                <div>{{ $emisora->tiktok }}</div>
                            </div>
                            <div class="col-md-3">
                                <strong>Email:</strong>
                                <div>{{ $emisora->email }}</div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <strong>Email 2:</strong>
                                <div>{{ $emisora->email2 }}</div>
                            </div>
                            <div class="col-md-3">
                                <strong>Email 3:</strong>
                                <div>{{ $emisora->email3 }}</div>
                            </div>
                            <div class="col-md-3">
                                <strong>Telefono:</strong>
                                <div>{{ $emisora->telefono1 }}</div>
                            </div>
                            <div class="col-md-3">
                                <strong>Celular:</strong>
                                <div>{{ $emisora->celular }}</div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="row mb-3">
                            <div class="col-md-3">
                                <strong>Gerente:</strong>
                                <div>{{ $emisora->gerente }}</div>
                            </div>
                            <div class="col-md-3">
                                <strong>Telefono del Gerente:</strong>
                                <div>{{ $emisora->telefono_gerente }}</div>
                            </div>
                            <div class="col-md-3">
                                <strong>Director Noticias:</strong>
                                <div>{{ $emisora->director_noticias }}</div>
                            </div>
                            <div class="col-md-3">
                                <strong>Telefono del Director Noticias:</strong>
                                <div>{{ $emisora->telefono_director_noticias }}</div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <strong>Encargado de Pauta:</strong>
                                <div>{{ $emisora->encargado_pauta }}</div>
                            </div>
                            <div class="col-md-3">
                                <strong>Telefono del Encargado de Pauta:</strong>
                                <div>{{ $emisora->telefono_encargado_pauta }}</div>
                            </div>
                            <div class="col-md-3">
                                <strong>Representante Legal:</strong>
                                <div>{{ $emisora->representante_legal }}</div>
                            </div>
                            <div class="col-md-3">
                                <strong>Telefono del Representante Legal:</strong>
                                <div>{{ $emisora->telefono_representante_legal }}</div>
                            </div>
                        </div>

                        <hr class="my-4">

                        {{-- NUEVA SECCIÓN: ESTADO DE LA EMISORA --}}
                        <h4><b>Estado de la Emisora</b></h4>
                        <br>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <strong>Emisora Activa:</strong>
                                <div>
                                    @if ($emisora->emisora_activa)
                                        <span class="badge bg-success">Sí</span>
                                    @else
                                        <span class="badge bg-danger">No</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-9"> {{-- Usa más columnas para la observación --}}
                                <strong>Observación del Estado de la Emisora:</strong>
                                <div>{{ $emisora->observacion_estado_emisora ?? 'N/A' }}</div>
                            </div>
                        </div>
                        <hr class="my-4">
                        {{-- FIN NUEVA SECCIÓN --}}

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <strong>Observaciones:</strong>
                                <div>{{ $emisora->observaciones }}</div>
                            </div>
                        </div>

                        <br>
                        <hr class="my-4">

                        <div class="row mb-3">

                            <div class="col-md-6">
                            <h4><b>Coberturas</b></h4>
                                @if($coberturas->count() > 0)
                                    <ul class="list-group">
                                        @foreach($coberturas as $cobertura)
                                            <li class="list-group-item">
                                                <strong>Municipio:</strong> {{ $cobertura->municipio->name }} |
                                                <strong>Dpto:</strong> {{ $cobertura->municipio->estado->name }}
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p>No hay coberturas registradas para esta emisora.</p>
                                @endif
                            </div>
                        
                    
                            <div class="col-md-6">
                                <h4><b>Fiestas</b></h4>
                                @if($fiestas->count() > 0)
                                    <ul class="list-group">
                                        @foreach($fiestas as $fiesta)
                                            <li class="list-group-item">
                                                <strong>Nombre:</strong> {{ $fiesta->nombre }} |
                                                <strong>Fecha:</strong> {{ $fiesta->fecha }}
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p>No hay fiestas registradas para esta emisora.</p>
                                @endif
                            </div>

                        </div>

                        <br>
                        <hr class="my-4">

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <h4><b>Programas</b></h4>
                                @if($programas->count() > 0)
                                    <ul class="list-group">
                                        @foreach($programas as $programa)
                                            <li class="list-group-item">
                                                <strong>Nombre:</strong> {{ $programa->nombre_programa }} |
                                                <strong>Locutor:</strong> {{ $programa->nombre_locutor }} |
                                                <strong>Tipo:</strong> {{ $programa->tipoPrograma->name }} |
                                                <strong>Horario:</strong> {{ $programa->horario }} |
                                                <strong>Tarifa:</strong> {{ $programa->costo }} |
                                                <strong>Dias de transmisión :</strong> 
                                                <small>
                                                    {{ $programa->lunes ? 'LU' : '' }}
                                                    {{ $programa->martes ? 'MA' : ''}}
                                                    {{ $programa->miercoles ? 'MI' : ''}}
                                                    {{ $programa->jueves ? 'JU' : ''}}
                                                    {{ $programa->viernes ? 'VI' : ''}}
                                                    {{ $programa->sabado ? 'SA' : ''}}
                                                    {{ $programa->domingo ? 'DO' : ''}}
                                                </small>
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p>No hay programas registrados para esta emisora.</p>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        

    </section>
@endsection
