@extends('layouts.app')

@section('template_title')
    {{ __('Crear') }} Tipo Programa
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <br>
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Crear') }} Tipo Programa</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('tipo-programas.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('tipo-programa.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
