@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Reporte Item
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">
<br>
                <div class="card card-default">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <b>Editar Reporte N: </b> {{ $id_reporte }} 
                               
                            </div>
                            <div class="col-6" style="text-align: right">
                                   <b> Vigencia desde: </b> <span style="color: red"> {{ $vigencia_desde }} </span> <b> hasta: </b> <span style="color: red"> {{ $vigencia_hasta  }} </span>
                                   <input type="date" name="vigencia_desde" wire:model.live="vigencia_desde"  style="display: none" class="form-control @error('vigencia_desde') is-invalid @enderror" value="{{ $vigencia_desde }}" id="vigencia_desde" placeholder="Reporte Id">
                                   <input type="date" name="vigencia_hasta" wire:model.live="vigencia_hasta"  style="display: none" class="form-control @error('vigencia_hasta') is-invalid @enderror" value="{{ $vigencia_hasta }}" id="vigencia_hasta" placeholder="Reporte Id">
                            </div>
                        </div>
                    </div>
                    <div class="card-body bg-white">
                        @livewire('filtro-programas-emisoras-edit', [
                            'id' => $id,
                            'idreporte' => $id_reporte,
                            'emisoraSeleccionada' => $reporteItem->id_emisora,
                            'vigencia_desde' => $vigencia_desde,
                            'vigencia_hasta' => $vigencia_hasta,
                        ])
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
