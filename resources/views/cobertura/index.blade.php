@extends('layouts.app')

@section('template_title')
    Coberturas
@endsection

@section('content')
<br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">

                    @livewire('municipio-form', ['id_emisora' => $id_emisora])

                </div>
            </div>
        </div>
    </div>

    <style>
        .alert.alert-success.m-4 {
            margin: 0 0 20px !important;
        }
    </style>
   
@endsection

