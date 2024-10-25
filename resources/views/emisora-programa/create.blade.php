@extends('layouts.app')

@section('template_title')
    {{ __('Create') }}  Programa de Emisora
@endsection

@section('content')
<br>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Emisora Programa</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('emisora-programas.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('emisora-programa.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
