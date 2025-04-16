@extends('layouts.app')

@section('template_title')
    {{ __('Actualizar') }} País
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <br>
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Actualizar') }} País</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('paises.update', $paise->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('paise.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
