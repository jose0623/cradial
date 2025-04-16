@extends('layouts.app')
@section('template_title')
    {{ __('Create') }} Reporte Item
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <br>
                <div class="card card-default">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <b>Reporte N: </b> {{ $id_reporte }} 
                               
                            </div>
                            <div class="col-6" style="text-align: right">
                                   <b> Vigencia desde: </b> <span style="color: red"> {{ $vigencia_desde }} </span> <b> hasta: </b> <span style="color: red"> {{ $vigencia_hasta  }} </span>
                                   <input type="date" name="vigencia_desde" wire:model.live="vigencia_desde"  style="display: none" class="form-control @error('vigencia_desde') is-invalid @enderror" value="{{ $vigencia_desde }}" id="vigencia_desde" placeholder="Reporte Id">
                                   <input type="date" name="vigencia_hasta" wire:model.live="vigencia_hasta"  style="display: none" class="form-control @error('vigencia_hasta') is-invalid @enderror" value="{{ $vigencia_hasta }}" id="vigencia_hasta" placeholder="Reporte Id">
                            </div>
                        </div>
                
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('reporte-items.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="reporte_id" class="form-control @error('reporte_id') is-invalid @enderror" value="{{ $id_reporte }}" id="reporte_id" placeholder="Reporte Id">
                            
                            @include('reporte-item.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
