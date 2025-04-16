@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} País
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <br>
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Crear') }} País</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('paises.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('paise.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
