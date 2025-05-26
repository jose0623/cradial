@extends('layouts.app')

@section('template_title')
    Emisoras
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
                                {{ __('Emisoras') }}
                            </span>
                            <div class="float-right">
                                <a href="{{ route('emisoras.create') }}" class="btn btnbr btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nueva') }}
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
                        @livewire('emisora-search')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection