@extends('layouts.app')

@section('template_title')
    {{ __('Crear') }} Tipo Emisora
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <br>
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Crear') }} Tipo Emisora</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('tipo-emisoras.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('tipo-emisora.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
