@extends('layouts.app')

@section('template_title')
    {{ $fiesta->name ?? __('Ver') . " " . __('Fiesta') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <br>
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Ver') }} Fiesta</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btnbr btn-primary btn-sm " href="{{ route('emisora.fiestas.index', $fiesta->id_emisora) }}"> {{ __('Regresar') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Emisora:</strong>
                                    {{ $fiesta->emisora->name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre de la fiesta:</strong>
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
