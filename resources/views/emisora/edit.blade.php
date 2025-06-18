@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Emisora
@endsection

@section('content')

    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">
                <br>
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Actualizar') }} Emisora</span>
                        <div class="float-right">
                            <a class="btn btnbr btn-primary btn-sm" href="{{ route('emisoras.index') }}"> {{ __('Regresar') }}</a>
                          </div>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('emisoras.update', $emisora->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('emisora.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
