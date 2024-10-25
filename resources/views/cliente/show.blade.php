@extends('layouts.app')

@section('template_title')
    {{ $cliente->name ?? __('Show') . " " . __('Cliente') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Cliente</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('clientes.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre:</strong>
                                    {{ $cliente->nombre }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Telefono:</strong>
                                    {{ $cliente->telefono }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Direccion:</strong>
                                    {{ $cliente->direccion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nit:</strong>
                                    {{ $cliente->nit }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Plazo En Dias:</strong>
                                    {{ $cliente->plazo_en_dias }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Vendedor Id:</strong>
                                   
                                    {{ $cliente->vendedor_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Email:</strong>
                                    {{ $cliente->email }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Estado:</strong>
                                    {{ $cliente->municipio->estado->name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Municipio :</strong>
                                    {{ $cliente->municipio->name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fax:</strong>
                                    {{ $cliente->fax }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tipo De Documento:</strong>
                                    {{ $cliente->tipo_de_documento }}
                                    @if ($cliente->tipo_de_documento == 1)
                                        <div class="form-group mb-2 mb20">
                                            <strong>Tipo De Documento:</strong>
                                            NIT
                                        </div>
                                    @elseif ($cliente->tipo_de_documento == 2)
                                        <div class="form-group mb-2 mb20">
                                            <strong>Tipo De Documento:</strong>
                                            C.C
                                        </div>
                                    @elseif ($cliente->tipo_de_documento == 3)
                                        <div class="form-group mb-2 mb20">
                                            <strong>Tipo De Documento:</strong>
                                            C.E.
                                        </div>
                                    @elseif ($cliente->tipo_de_documento == 4)
                                        <div class="form-group mb-2 mb20">
                                            <strong>Tipo De Documento:</strong>
                                            T.T.
                                        </div>
                                    @else
                                        <div class="form-group mb-2 mb20">
                                            <strong>Tipo De Documento:</strong>
                                            OTRO
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Comun:</strong>
                                    {{ $cliente->comun ? 'Sí' : 'No'  }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Simplificado:</strong>
                                    {{ $cliente->simplificado ? 'Sí' : 'No' }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Gran contribuyente autoretenedor:</strong>
                                    {{ $cliente->gca ? 'Sí' : 'No' }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Gran contribuyente:</strong>
                                    {{ $cliente->gc  ? 'Sí' : 'No' }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tipo Cliente Id:</strong>
                                    {{ $cliente->tipoCliente->name }}

                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
