@extends('layouts.app')

@section('template_title')
    {{ $tipoEmisora->name ?? __('Show') . " " . __('Tipo Emisora') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Ver') }} Tipo Emisora</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('tipo-emisoras.index') }}"> {{ __('Regresar') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Name:</strong>
                                    {{ $tipoEmisora->name }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
