@extends('layouts.app')

@section('template_title')
    Clientes
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Clientes') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('clientes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
									<th >Nombre</th>
									<th >Telefono</th>
									<th >Direccion</th>
									<th >Nit</th>
									<th >Email</th>
									<th >Tipo Cliente</th>
									<th >Comun</th>
									<th >Simplificado</th>
									<th >Gca</th>
									<th >Gc</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clientes as $cliente)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $cliente->nombre }}</td>
										<td >{{ $cliente->telefono }}</td>
										<td >{{ $cliente->direccion }}</td>
										<td >{{ $cliente->nit }}</td>
										<td >{{ $cliente->email }}</td>
										<td >{{ $cliente->tipocliente->name }}</td>
										<td >{{ $cliente->comun ? 'Sí' : 'No'  }}</td>
										<td >{{ $cliente->simplificado ? 'Sí' : 'No'  }}</td>
										<td >{{ $cliente->gca ? 'Sí' : 'No'  }}</td>
										<td >{{ $cliente->gc ? 'Sí' : 'No'  }}</td>

                                            <td>
                                                <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('clientes.show', $cliente->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('clientes.edit', $cliente->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
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
                {!! $clientes->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
