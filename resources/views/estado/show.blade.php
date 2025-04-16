@extends('layouts.app')

@section('template_title')
    {{ $estado->name ?? __('Show') . " " . __('Estado') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <br>
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Departamento') }}  </span>
                        </div>
                        <div class="float-right">
                            <a class="btn btnbr btn-danger btn-sm" href="{{ route('estados.index') }}"> {{ __('Regresar') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre:</strong>
                                    {{ $estado->name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>País :</strong>
                                    {{ $estado->paise->name }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
