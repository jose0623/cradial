<div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group mb-2 mb20">
                <label for="estado_id" class="form-label">{{ __('Departamento') }}</label>
                <select class="form-control" id="estado" wire:model.live="estadoSeleccionado">
                    <option value="">Seleccione un Departamento</option>
                    @foreach($estados as $estado)
                        <option value="{{ $estado->id }}">{{ $estado->name }}</option>
                    @endforeach
                </select>
                {!! $errors->first('estado_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group mb-2 mb20">
                <label for="municipio_id" class="form-label">{{ __('Municipio') }}</label>
                <select class="form-control"  name="municipio_id" id="municipio_id" wire:model="municipioSeleccionado" wire:disabled="!$estadoSeleccionado">
                    <option value="">Seleccione un municipio</option>
                    @foreach($municipios as $municipio)
                        <option value="{{ $municipio->id }}">{{ $municipio->name }}</option>
                    @endforeach
                </select>
                {!! $errors->first('municipio_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
        </div>
    </div>

</div>