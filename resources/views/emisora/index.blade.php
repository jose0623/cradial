@extends('layouts.app')

@section('template_title')
    Emisoras
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Emisoras') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('emisoras.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        <th>No</th>
                                        
									<th >Name</th>
									<th >Potencia</th>
									<th >Dial</th>
									<th >Tipo Emisoras Id</th>
									<th >Estado</th>
									<th >Municipio</th>
									

                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($emisoras as $emisora)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $emisora->name }}</td>
										<td >{{ $emisora->potencia }}</td>
										<td >{{ $emisora->dial }}</td>
										<td >{{ $emisora->tipoEmisora->name  }}</td>
										<td >{{ $emisora->municipio->estado->name }}</td>
										<td >{{ $emisora->municipio->name }}</td>

                                        <td class="" style="text-align: right;">
                                            <a class="btn btn-sm btn-primary " href="{{ route('cobertura', $emisora->id) }}"><i class="fa fa-fw fa-signal"></i> {{ __('Cobertura') }}</a>
                                            <a class="btn btn-sm btn-info " href="{{ route('emisora.programas.index', $emisora->id) }}"><i class="fa fa-fw fa-film"></i> {{ __('Programas') }}</a>
                                            <a class="btn btn-sm btn-dark " href="{{ route('emisora.fiestas.index', $emisora->id) }}"><i class="bi bi-currency-dollar"></i> {{ __('Fiestas') }}</a>
                                        </td>

                                        <td class="float-right">
                                            <form action="{{ route('emisoras.destroy', $emisora->id) }}" method="POST">
                                                <a class="btn btn-sm btn-primary " href="{{ route('emisoras.show', $emisora->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                <a class="btn btn-sm btn-success" href="{{ route('emisoras.edit', $emisora->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
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
                {!! $emisoras->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
