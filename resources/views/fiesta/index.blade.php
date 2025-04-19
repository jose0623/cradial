@extends('layouts.app')

@section('template_title')
    Fiestas
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Fiestas') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('emisora.fiestas.create', ['id_emisora' => $id_emisora]) }}" class="btn btn-primary btn-sm float-right">
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
                                        
									<th >Id Emisora</th>
									<th >Nombre</th>
									<th >Fecha</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($fiestas as $fiesta)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $fiesta->id_emisora }}</td>
										<td >{{ $fiesta->nombre }}</td>
										<td >{{ $fiesta->fecha }}</td>

                                            <td>
                                                <form action="{{ route('emisora.fiestas.destroy', $fiesta->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('emisora.fiestas.show', $fiesta->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('emisora.fiestas.edit', $fiesta->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $fiestas->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
