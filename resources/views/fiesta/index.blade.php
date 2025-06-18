@extends('layouts.app')

@section('template_title')
    Fiestas
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
                                {{ __('Fiestas de Emisora') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('emisoras.index') }}" class="btn btnbr btn-secondary btn-sm float-right me-2">
                                    {{ __('Regresar a Emisoras') }}
                                </a>
                                <a href="{{ route('emisora.fiestas.create', ['id_emisora' => $id_emisora]) }}" class="btn btnbr btn-primary btn-sm float-right">
                                    {{ __('Crear nueva') }}
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
                        @livewire('fiesta-search', ['id_emisora' => $id_emisora])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection