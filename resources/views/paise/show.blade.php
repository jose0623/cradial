@extends('layouts.app')

@section('template_title')
    {{ $paise->name ?? __('Show') . " " . __('Paise') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <br>
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('País') }} </span>
                        </div>
                        <div class="float-right ">
                            <a class="btn btnbr btn-danger btn-sm" href="{{ route('paises.index') }}"> {{ __('Regresar') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre:</strong>
                                    {{ $paise->name }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
