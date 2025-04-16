<div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group mb-2 mb20">
                <label for="tipo_cuna" class="form-label">{{ __('Tipo de pauta') }}</label>
                <select wire:model.live="tipo_cuna" required name="tipo_cuna" id="tipo_cuna" class="form-control">
                    <option value="">Seleccione...</option>
                    <option value="1">Cuña</option>
                    <option value="2">Mencion</option>
                </select>
                @error('tipo_cuna') <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div> @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group mb-2 mb20">
                <label for="duracion" class="form-label">{{ __('Duracion') }}</label>
                <select wire:model.live="duracion" required name="duracion" id="duracion" class="form-control">
                    <option value="">Seleccione...</option>
                    <option value="30%">5s</option>
                    <option value="50%">10s</option>
                    <option value="60%">15s</option>
                    <option value="75%">20s</option>
                    <option value="85%">25s</option>
                    <option value="0%">30s</option>
                    <option value="120%">35s</option>
                    <option value="133%">40s</option>
                    <option value="150%">45s</option>
                    <option value="170%">50s</option>
                    <option value="185%">55s</option>
                    <option value="200%">1min</option>
                </select>
                @error('duracion') <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div> @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group mb-2 mb20">
                <label for="cunas_por_dia" class="form-label">{{ __('Cunas Por Dia') }}</label>
                <input wire:model.live="cunas_por_dia" type="number" name="cunas_por_dia" class="form-control @error('cunas_por_dia') is-invalid @enderror" value="{{ $cunas_por_dia }}" id="cunas_por_dia" placeholder="Cunas Por Dia">
                @error('cunas_por_dia') <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div> @enderror
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group mb-2 mb20">
                <label for="bonificacion" class="form-label">{{ __('Bonificacion') }}</label>
                <input wire:model.live="bonificacion" type="text" name="bonificacion" class="form-control @error('bonificacion') is-invalid @enderror" value="{{ $bonificacion }}" id="bonificacion" placeholder="Bonificacion">
                @error('bonificacion') <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div> @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group mb-2 mb20">
                <label for="descuento" class="form-label">{{ __('Descuento') }}</label>
                <input wire:model.live="descuento" type="text" name="descuento" class="form-control @error('descuento') is-invalid @enderror" value="{{ $descuento }}" id="descuento" placeholder="Descuento">
                @error('descuento') <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div> @enderror
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group mb-2 mb20">
                <label for="cantidad_dias" class="form-label">{{ __('Cantidad Dias') }}</label>
                <input readonly type="text" name="cantidad_dias" class="form-control @error('cantidad_dias') is-invalid @enderror" value="{{ $cantidad_dias }}" id="cantidad_dias" placeholder="Cantidad Dias">
                @error('cantidad_dias') <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div> @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group mb-2 mb20">
                <label for="valor_unitario" class="form-label">{{ __('Valor Unitario') }}</label>
                <input readonly type="text" name="valor_unitario" class="form-control @error('valor_unitario') is-invalid @enderror" value="{{ $valor_unitario }}" id="valor_unitario" placeholder="Valor Unitario">
                @error('valor_unitario') <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div> @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group mb-2 mb20">
                <label for="valor_neto" class="form-label">{{ __('Valor Neto') }}</label>
                <input readonly type="text" name="valor_neto" class="form-control @error('valor_neto') is-invalid @enderror" value="{{ $valor_neto }}" id="valor_neto" placeholder="Valor Neto">
                @error('valor_neto') <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div> @enderror
            </div>
        </div>
    </div>
</div>