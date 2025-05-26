@extends('layouts.app')

@section('template_title')
    Emisora Programas
@endsection

@section('content')
<br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            
                                <span id="card_title">
                                    {{ __('Emisora:') }}  <b> {{ $emisora->name }} </b>
                                </span>
                           

                             <div class="float-right">
                                <a href="{{ route('emisora.programas.create', ['id_emisora' => $id_emisora]) }}" class="btn btnbr btn-primary btn-sm float-right"  data-placement="left">
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

                    {{-- Versión con Livewire (recomendada) --}}
                    <div class="card-body bg-white">
                        @livewire('emisora-programa-search', ['id_emisora' => $id_emisora])
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection