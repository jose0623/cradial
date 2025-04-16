<div>

    <div class="row">
        <div class="col-md-4">
            <div>
                <label for="estado" class="form-label">{{ __('Estado:') }}</label>
                <select wire:model.live="estadoSeleccionado" id="estado" name="estado" class="form-control">
                    <option value="">Seleccione un estado</option>
                    @foreach ($estados as $estado)
                        <option value="{{ $estado->id }}">{{ $estado->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div>
                <label for="municipio" class="form-label">{{ __('Municipio:') }}</label>
                <select wire:model.live="municipioSeleccionado" id="municipio" name="municipio" class="form-control" @if (!$municipios->count()) disabled @endif>
                    <option value="">Seleccione un municipio</option>
                    @foreach ($municipios as $municipio)
                        <option value="{{ $municipio->id }}">{{ $municipio->name }}</option>
                    @endforeach
                </select>
                @if ($estadoSeleccionado && !$municipios->count())
                    <p class="text-red-500">No se encontraron municipios para el estado seleccionado.</p>
                @endif
            </div>
        </div>

        <div class="col-md-4">
            <div>
                <label for="tipo_programa" class="form-label">{{ __('Tipo de Programación:') }}</label>
                <select wire:model.live="tipoProgramaSeleccionado" id="tipo_programa" name="tipo_programa" class="form-control" @if (!$tiposProgramas->count()) disabled @endif>
                    <option value="">Seleccione un tipo de programa</option>
                    @foreach ($tiposProgramas as $tipoPrograma)
                        <option value="{{ $tipoPrograma->id }}">{{ $tipoPrograma->name }}</option>
                    @endforeach
                </select>
                @if ($municipioSeleccionado && !$tiposProgramas->count())
                    <p class="text-red-500">No se encontraron tipos de programa para el municipio seleccionado.</p>
                @endif
            </div>
        </div>
    </div>

    <br>
    <div class="row">
        <div class="col-md-4">
            <div>
                <label for="id_emisora" class="form-label">{{ __('Emisora: ') }}</label>
                <select wire:model.live="emisoraSeleccionada" id="emisora" name="id_emisora" class="form-control" @if (!$emisorasFiltradas->count()) disabled @endif>
                    <option value="">Seleccione una emisora</option>
                    @foreach ($emisorasFiltradas as $emisora)
                        <option value="{{ $emisora->id }}">
                            {{ $emisora->name }}
                            @if ($emisora->es_direccion_fisica) (Dirección Física) @endif
                            @if ($emisora->es_por_region) (Por Región) @endif
                        </option>
                    @endforeach
                </select>
                @if ($tipoProgramaSeleccionado && $municipioSeleccionado && !$emisorasFiltradas->count())
                    <p class="text-red-500">No se encontraron emisoras con el tipo de programa en el municipio seleccionado.</p>
                @endif
            </div>
        </div>

        <div class="col-md-4">
            <div>
                <label for="id_programa" class="form-label">{{ __('Programa') }}</label>
                <select wire:model.live="emisoraProgramaSeleccionadoId" id="programa_id" name="programa_id" class="form-control" @if (!$emisoraProgramas->count()) disabled @endif>
                    <option value="">Seleccione un programa</option>
                    @foreach ($emisoraProgramas as $emisoraPrograma)
                        <option value="{{ $emisoraPrograma->id }}">
                            {{ $emisoraPrograma->nombre_programa }}
                        </option>
                    @endforeach
                </select>
                @if ($emisoraSeleccionada && !$emisoraProgramas->count())
                    <p class="text-red-500">No se encontraron programas para la emisora seleccionada.</p>
                @endif
            </div>
        </div>
    

        @if ($programaSeleccionado)
        <div class="col-md-4">
            <div class="form-group mb-2 mb20">
                <label class="form-label">{{ __('Días de transmisión') }}</label>
                <input 
                    type="number" 
                    class="form-control" 
                    name="cantidad_dias"
                    value="{{ $cantidad_dias_transmision }}" 
                    readonly
                >
                <small class="text-muted">
                   <b> Días activos: </b>
                   <span style="color: red">
                       @if($programaSeleccionado)
                       @if($programaSeleccionado->lunes) LU @endif
                       @if($programaSeleccionado->martes) MA @endif
                       @if($programaSeleccionado->miercoles) MI @endif
                       @if($programaSeleccionado->jueves) JU @endif
                       @if($programaSeleccionado->viernes) VI @endif
                       @if($programaSeleccionado->sabado) SA @endif
                       @if($programaSeleccionado->domingo) DO @endif
                       @endif
                    </span>
                </small>
            </div>
        </div>
        @endif
    </div>

    @if ($programaSeleccionado)
    <div class="row">
        <div class="col-md-4">
            <div>
                <div class="form-group mb-2 mb20">
                    <label for="Horario" class="form-label">{{ __('Horario') }}</label>
                    <input type="text" name="horario" class="form-control" value=" {{ $programaSeleccionado->horario }}" readonly >
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div>
                <div class="form-group mb-2 mb20">
                    <label for="locutor" class="form-label">{{ __('Locutor') }}</label>
                    <input type="text" name="locutor" class="form-control" value=" {{ $programaSeleccionado->nombre_locutor }}" readonly >
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div>
                <div class="form-group mb-2 mb20">
                    <label for="precio" class="form-label">{{ __('Precio Base') }}</label>
                    <input wire:model.live="precio_base" type="text" name="precio" class="form-control" value=" {{ $programaSeleccionado->costo }}" readonly>
                </div>
            </div>
        </div>
    </div>
    <br>
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
                    <option value="100%">30s</option>
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
                <input wire:model.live="cunas_por_dia" type="number" name="cunas_por_dia" class="form-control @error('cunas_por_dia') is-invalid @enderror" value="1" id="cunas_por_dia" placeholder="Cunas Por Dia">
                @error('cunas_por_dia') <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div> @enderror
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group mb-2 mb20">
                <label for="bonificacion" class="form-label">{{ __('Bonificacion') }}</label>
                <input wire:model.live="bonificacion" type="number" name="bonificacion" class="form-control @error('bonificacion') is-invalid @enderror" value="0" id="bonificacion" placeholder="Bonificacion">
                @error('bonificacion') <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div> @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group mb-2 mb20">
                <label for="descuento" class="form-label">{{ __('Descuento') }}</label>
                <input wire:model.live="descuento" type="number" name="descuento" class="form-control @error('descuento') is-invalid @enderror" value="0" id="descuento" placeholder="Descuento">
                @error('descuento') <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div> @enderror
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        
        <div class="col-md-4">
            <div class="form-group mb-2 mb20">
                <label for="valor_unitario" class="form-label">{{ __('Valor Unitario') }}</label>
                <input readonly type="number" name="valor_unitario" class="form-control @error('valor_unitario') is-invalid @enderror" value="{{ $valor_unitario }}" id="valor_unitario" placeholder="Valor Unitario">
                @error('valor_unitario') <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div> @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group mb-2 mb20">
                <label for="valor_dia" class="form-label">{{ __('Valor x Dia') }}</label>
                <input readonly type="number" name="valor_dia" class="form-control @error('valor_dia') is-invalid @enderror" value="{{ $valor_dia }}" id="valor_dia" placeholder="Valor dia">
                @error('valor_dia') <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div> @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group mb-2 mb20">
                <label for="valor_neto" class="form-label">{{ __('Valor Total') }}</label>
                <input readonly type="number" name="valor_neto" class="form-control @error('valor_neto') is-invalid @enderror" value="{{ $valor_neto }}" id="valor_neto" placeholder="Valor Neto">
                @error('valor_neto') <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div> @enderror
            </div>
        </div>
    </div>
    

    @endif
   
</div>