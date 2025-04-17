@extends('layouts.app')

@section('template_title')
    {{ __('Actualizar') }} Tipo Programa
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Actualizar') }} Tipo Programa</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('tipo-programas.update', $tipoPrograma->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('tipo-programa.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
