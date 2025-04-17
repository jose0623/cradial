@extends('layouts.app')

@section('template_title')
    {{ $tipoPrograma->name ?? __('Show') . " " . __('Tipo Programa') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <br>
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Tipo Programa') }} </span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btnbr btn-sm" href="{{ route('tipo-programas.index') }}"> {{ __('Regresar') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre:</strong>
                                    {{ $tipoPrograma->name }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
