@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Tipo Afiliacione
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">
                <br>
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Actualizar') }} Afiliación</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('tipo-afiliaciones.update', $tipoAfiliacione->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('tipo-afiliacione.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
