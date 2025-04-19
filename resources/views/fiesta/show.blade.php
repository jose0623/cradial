@extends('layouts.app')

@section('template_title')
    {{ $fiesta->name ?? __('Show') . " " . __('Fiesta') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Fiesta</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('emisora.fiestas.index', $fiesta->id_emisora) }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Emisora:</strong>
                                    {{ $fiesta->id_emisora }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre:</strong>
                                    {{ $fiesta->nombre }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha:</strong>
                                    {{ $fiesta->fecha }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
