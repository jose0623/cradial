<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="emisora_id" class="form-label">{{ __('Emisora Id') }}</label>
            <input type="text" name="emisora_id" class="form-control @error('emisora_id') is-invalid @enderror" value="{{ old('emisora_id', $cobertura?->emisora_id) }}" id="emisora_id" placeholder="Emisora Id">
            {!! $errors->first('emisora_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="municipio_id" class="form-label">{{ __('Municipio Id') }}</label>
            <input type="text" name="municipio_id" class="form-control @error('municipio_id') is-invalid @enderror" value="{{ old('municipio_id', $cobertura?->municipio_id) }}" id="municipio_id" placeholder="Municipio Id">
            {!! $errors->first('municipio_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>