@extends('layouts.app')

@section('template_title')
    Departamentos
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <br>
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Departamentos') }}
                            </span>
                            <div class="float-right">
                                <a href="{{ route('estados.create') }}" class="btn btnCreate btn-primary btn-sm float-right"  data-placement="left">
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
                        @livewire('estado-search')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection