@extends('layouts.app')

@section('template_title')
    Reporte Items
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <br>
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div>
                                <h4><strong>Reporte de Trazabilidad</strong></h4>
                                @php
                                    $reporte = $reporteItems->first() ? $reporteItems->first()->reporte : null;
                                @endphp
                                @if($reporte)
                                    <b>Reporte N: </b> {{ $reporte->id }}-{{ $reporte->codigo_propuesta }} <br>
                                @else
                                    <b>Reporte N: </b> N/A <br>
                                @endif
                                <b>Vigencia: </b> {{ $vigencia_desde }} - {{ $vigencia_hasta }}
                                <br>
                                <b>Total Items: </b> {{ $reporteItems->count() }}
                            </div>
                            <div class="float-right">
                                <a href="{{ route('reportes.reporte-items.create', ['id_reporte' => $id_reporte]) }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    <i class="fa fa-plus"></i> {{ __('Crear Nuevo') }}
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <!-- Estadísticas Generales -->
                        <div class="row mb-4">
                            <div class="col-md-3">
                                <div class="card bg-primary text-white">
                                    <div class="card-body text-center">
                                        <h5>Precio Base</h5>
                                        <h3>{{ $reporteItems->where('precio_base', '!=', null)->count() }}</h3>
                                        <small>Items registrados</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card bg-success text-white">
                                    <div class="card-body text-center">
                                        <h5>Precio Venta</h5>
                                        <h3>{{ $reporteItems->where('precio_venta', '!=', null)->count() }}</h3>
                                        <small>Items registrados</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card bg-info text-white">
                                    <div class="card-body text-center">
                                        <h5>Con IVA</h5>
                                        <h3>{{ $reporteItems->where('valor_iva', '>', 0)->count() }}</h3>
                                        <small>Items con IVA</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card bg-warning text-white">
                                    <div class="card-body text-center">
                                        <h5>Recargos</h5>
                                        <h3>{{ $reporteItems->filter(function($item) { return $item->recargo_noticiero == 1 || $item->recargo_mencion == 1; })->count() }}</h3>
                                        <small>Items con recargos</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tabla Detallada de Trazabilidad + Acciones -->
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Item</th>
                                        <th>Emisora</th>
                                        <th>Programa</th>
                                        <th>Precio Base</th>
                                        <th>Precio Venta</th>
                                        <th>Factor Duración</th>
                                        <th>Recargos</th>
                                        <th>IVA (%)</th>
                                        <th>Valor IVA</th>
                                        <th>Total con IVA</th>
                                        <th>Usuario</th>
                                        <th>Fecha</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reporteItems as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->emisora->name ?? 'N/A' }}</td>
                                            <td>{{ $item->programa->nombre_programa ?? 'N/A' }}</td>
                                            <td>{{ $item->precio_base ? number_format($item->precio_base, 2) : 'N/A' }}</td>
                                            <td>{{ $item->precio_venta ? number_format($item->precio_venta, 2) : 'N/A' }}</td>
                                            <td>{{ $item->factor_duracion ?? 'N/A' }}</td>
                                            <td>
                                                @if($item->recargo_noticiero)
                                                    <span class="badge bg-danger">Noticiero</span>
                                                @endif
                                                @if($item->recargo_mencion)
                                                    <span class="badge bg-warning">Mención</span>
                                                @endif
                                                @if(!$item->recargo_noticiero && !$item->recargo_mencion)
                                                    <span class="badge bg-secondary">Sin recargo</span>
                                                @endif
                                            </td>
                                            <td>{{ $item->iva_aplicado ? $item->iva_aplicado . '%' : 'N/A' }}</td>
                                            <td>{{ $item->valor_iva ? number_format($item->valor_iva, 2) : 'N/A' }}</td>
                                            <td>{{ $item->valor_total_con_iva ? number_format($item->valor_total_con_iva, 2) : 'N/A' }}</td>
                                            <td>{{ $item->usuario_creador_id ?? 'N/A' }}</td>
                                            <td>{{ $item->created_at ? $item->created_at->format('d/m/Y H:i') : 'N/A' }}</td>
                                            <td>
                                                <form action="{{ route('reporte-items.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('reporte-items.show', $item->id) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('reporte-items.edit', $item->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); if(confirm('¿Estás seguro de eliminar?')) this.closest('form').submit();"><i class="fa fa-fw fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {!! $reporteItems->withQueryString()->links() !!}

                        <!-- Resumen de Factores -->
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h6><strong>Factores de Duración Utilizados</strong></h6>
                                    </div>
                                    <div class="card-body">
                                        @php
                                            $factores = $reporteItems->where('factor_duracion', '!=', null)->groupBy('factor_duracion');
                                        @endphp
                                        @foreach($factores as $factor => $items)
                                            <div class="d-flex justify-content-between">
                                                <span>{{ $factor }}</span>
                                                <span class="badge bg-primary">{{ $items->count() }} items</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h6><strong>Tipos de Recargo</strong></h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <span>Noticiero</span>
                                            <span class="badge bg-danger">{{ $reporteItems->where('recargo_noticiero', 1)->count() }} items</span>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <span>Mención</span>
                                            <span class="badge bg-warning">{{ $reporteItems->where('recargo_mencion', 1)->count() }} items</span>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <span>Sin recargo</span>
                                            <span class="badge bg-secondary">{{ $reporteItems->where('recargo_noticiero', 0)->where('recargo_mencion', 0)->count() }} items</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
