<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div>
            @livewire('filtro-programas-emisoras', [
                'vigencia_desde' => $vigencia_desde,
                'vigencia_hasta' => $vigencia_hasta,
            ])
        </div>
        <br>
       
    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>



