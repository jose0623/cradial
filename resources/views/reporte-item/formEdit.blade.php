<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div>
            <div>
                @livewire('filtro-programas-emisoras-edit', [
                    'id' => $id,
                    'idreporte' => $id_reporte,
                    'emisoraSeleccionada' => $reporteItem->id_emisora,
                    'vigencia_desde' => $vigencia_desde,
                    'vigencia_hasta' => $vigencia_hasta,
                ])
            </div>
        </div>
        <br>
       
    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>



