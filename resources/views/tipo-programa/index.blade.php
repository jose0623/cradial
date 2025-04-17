@extends('layouts.app')

@section('template_title')
    Tipo Programas
@endsection

@section('content')
<style>
    form {
        width: max-content;
        margin: 0 0 0 auto;
    }
</style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <br>
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Tipo Programas') }}
                            </span>
                            <div class="float-right">
                                <a href="{{ route('tipo-programas.create') }}" class="btn btnbr btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nuevo') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        @livewire('tipo-programa-search')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection