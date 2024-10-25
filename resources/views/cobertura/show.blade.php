@extends('layouts.app')

@section('template_title')
    {{ $cobertura->name ?? __('Show') . " " . __('Cobertura') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Cobertura</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('coberturas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Emisora Id:</strong>
                                    {{ $cobertura->emisora_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Municipio Id:</strong>
                                    {{ $cobertura->municipio_id }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
