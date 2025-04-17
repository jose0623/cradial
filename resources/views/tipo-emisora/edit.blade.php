@extends('layouts.app')

@section('template_title')
    {{ __('Actualizar') }} Tipo Emisora
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">
                <br>
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Actualizar') }} Tipo Emisora</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('tipo-emisoras.update', $tipoEmisora->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('tipo-emisora.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
