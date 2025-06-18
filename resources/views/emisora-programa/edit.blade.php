@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Emisora Programa
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">
                <br>
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Actualizar') }} Programa</span>
                        <div class="float-right">
                            <a class="btn btn-primary btnbr btn-sm" href="{{ route('emisora.programas.index', ['id_emisora' =>  $emisoraPrograma->id_emisora  ] ) }}"> {{ __('Regresar') }}</a>
                        </div>  
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('emisora-programas.update', $emisoraPrograma->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('emisora-programa.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
