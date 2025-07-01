@extends('layouts.app')

@section('template_title')
    Reportes
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Reportes') }}
                            </span>
                            <div class="float-right">
                                <a href="{{ route('reportes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    {{ __('Crear Nuevo') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>Número de reporte</th>
                                        <th>Cliente</th>
                                        <th>Referencia</th>
                                        <th>Estado</th>
                                        <th>Producto del cliente R</th>
                                        <th>Vigencia Desde</th>
                                        <th>Vigencia Hasta</th>
                                        <th>Total</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reportes as $reporte)
                                        <tr>
                                            <td>{{ $reporte->id }}-{{ $reporte->codigo_propuesta }}</td>
                                            <td>{{ $reporte->cliente->nombre }}</td>
                                            <td>{{ $reporte->titulo }}</td>
                                            <td>{{ $reporte->estado }}</td>
                                            <td>{{ $reporte->es_propuesta }}</td>
                                            <td>{{ $reporte->vigencia_desde }}</td>
                                            <td>{{ $reporte->vigencia_hasta }}</td>
                                            <td>{{ $reporte->total }}</td>
                                            <td class="" style="text-align: right;">
                                                <a class="btn btn-sm btn-info " href="{{ route('reportes.reporte-items.index', $reporte->id) }}"><i class="fa fa-play"></i>  Cargar</a>
                                            </td>
                                            <td>
                                                <form action="{{ route('reportes.destroy', $reporte->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('reportes.show', $reporte->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('reportes.edit', $reporte->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('¿Estás seguro de eliminar?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $reportes->withQueryString()->links() !!} {{-- Render the pagination links --}}
            </div>
        </div>
    </div>
@endsection