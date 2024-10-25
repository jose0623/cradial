@extends('layouts.app')

@section('template_title')
    Emisora Programas
@endsection

@section('content')
<br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                          
                            @if ($firstPrograma = $emisoraProgramas->first())
                            <span id="card_title">
                                {{ __('Programas de Emisora ')  }} <b> {{ $firstPrograma->emisora->name }} </b>
                            </span>
                            @else
                                <p>No hay programas disponibles.</p>
                            @endif

                             <div class="float-right">
                                <a href="{{ route('emisora.programas.create', ['id_emisora' => $id_emisora]) }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
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
                                        
									<th >Nombre Programa</th>
									<th >Tipo Programa</th>
									<th >Lunes</th>
									<th >Martes</th>
									<th >Miercoles</th>
									<th >Jueves</th>
									<th >Viernes</th>
									<th >Sabado</th>
									<th >Domingo</th>
									<th >Horario</th>
									<th >Nombre Locutor</th>
									<th >Activo</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($emisoraProgramas as $emisoraPrograma)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $emisoraPrograma->nombre_programa }}</td>
										<td >{{ $emisoraPrograma->tipoprograma->name }}</td>
										<td >{{ $emisoraPrograma->lunes ? 'Sí' : 'No' }}</td>
										<td >{{ $emisoraPrograma->martes ? 'Sí' : 'No'}}</td>
										<td >{{ $emisoraPrograma->miercoles ? 'Sí' : 'No'}}</td>
										<td >{{ $emisoraPrograma->jueves ? 'Sí' : 'No'}}</td>
										<td >{{ $emisoraPrograma->viernes ? 'Sí' : 'No'}}</td>
										<td >{{ $emisoraPrograma->sabado ? 'Sí' : 'No'}}</td>
										<td >{{ $emisoraPrograma->domingo ? 'Sí' : 'No'}}</td>
										<td >{{ $emisoraPrograma->horario }}</td>
										<td >{{ $emisoraPrograma->nombre_locutor }}</td>
										<td >{{ $emisoraPrograma->activo ? 'Sí' : 'No'}}</td>

                                            <td>
                                                <form action="{{ route('emisora.programas.destroy', $emisoraPrograma->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('emisora.programas.show', $emisoraPrograma->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('emisora.programas.edit', $emisoraPrograma->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $emisoraProgramas->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
