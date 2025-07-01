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
                                <a href="{{ route('reportes.reporte-items.create', ['id_reporte' => $id_reporte]) }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nuevo') }}
                                </a>
                                <a href="{{ route('reportes.reporte-items.trazabilidad', ['id_reporte' => $id_reporte]) }}" class="btn btn-info btn-sm float-right ml-2"  data-placement="left">
                                  <i class="fa fa-chart-bar"></i> {{ __('Trazabilidad') }}
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
                                    <th>No</th>
									<th >Emisora</th>
									<th >Programa</th>
									<th >Tipo</th>
									<th >Duracion</th>
									<th >Dias Emision</th>
									<th >Horario</th>
									<th >Cant Dias</th>
									<th >Cuña x Dia</th>
									<th >Precio Base</th>
									<th >Precio Venta</th>
									<th >Bonif</th>
									<th >Descuento</th>
									<th >Valor Total</th>
									<th >IVA</th>
									<th >Total con IVA</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reporteItems as $reporteItem)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $reporteItem->emisora->name }}</td>
										<td >{{ $reporteItem->programa->nombre_programa }}</td>
                                        <td>
                                            {{ $reporteItem->tipo_cuna == 1 ? 'Cuña' : ($reporteItem->tipo_cuna == 2 ? 'Mención' : $reporteItem->tipo_cuna) }}
                                        </td>
                                        <td>
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
                                        </td>

										<td > <small>
                                            {{ $reporteItem->programa->lunes == 1 ? 'LU' : '' }}
                                            {{ $reporteItem->programa->martes == 1 ? 'MA' : '' }}
                                            {{ $reporteItem->programa->miercoles == 1 ? 'MI' : '' }}
                                            {{ $reporteItem->programa->jueves == 1 ? 'JU' : '' }}
                                            {{ $reporteItem->programa->viernes == 1 ? 'VI' : '' }}
                                            {{ $reporteItem->programa->sabado == 1 ? 'SA' : '' }}
                                            {{ $reporteItem->programa->domingo == 1 ? 'DO' : '' }}
                                        </small>
                                        </td>
										<td >{{ $reporteItem->horario }}</td>
										<td >{{ $reporteItem->cantidad_dias }}</td>
										<td >{{ $reporteItem->cunas_por_dia }}</td>
										<td >{{ $reporteItem->precio_base }}</td>
										<td >{{ $reporteItem->precio_venta }}</td>
										<td >{{ $reporteItem->bonificacion }}</td>
										<td >{{ $reporteItem->descuento }}</td>
										<td >{{ $reporteItem->valor_neto }}</td>
										<td >{{ $reporteItem->valor_iva }}</td>
										<td >{{ $reporteItem->valor_total_con_iva }}</td>

                                            <td>
                                                <form action="{{ route('reporte-items.destroy', $reporteItem->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('reporte-items.show', $reporteItem->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('reporte-items.edit', $reporteItem->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
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
                {!! $reporteItems->withQueryString()->links() !!}
                
                <!-- Resumen de Trazabilidad -->
                <div class="card mt-4">
                    <div class="card-header">
                        <h5><strong>Resumen de Trazabilidad</strong></h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="text-center">
                                    <h6>Items con Precio Base</h6>
                                    <span class="badge bg-primary">{{ $reporteItems->where('precio_base', '!=', null)->count() }}</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="text-center">
                                    <h6>Items con Precio Venta</h6>
                                    <span class="badge bg-success">{{ $reporteItems->where('precio_venta', '!=', null)->count() }}</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="text-center">
                                    <h6>Items con IVA</h6>
                                    <span class="badge bg-info">{{ $reporteItems->where('valor_iva', '>', 0)->count() }}</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="text-center">
                                    <h6>Items con Recargos</h6>
                                    <span class="badge bg-warning">{{ $reporteItems->filter(function($item) { return $item->recargo_noticiero == 1 || $item->recargo_mencion == 1; })->count() }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
