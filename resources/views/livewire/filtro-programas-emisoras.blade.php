<form wire:submit.prevent="guardar">
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
        <div class="col-md-2">
            <div class="form-group mb-2 mb20">
                <label for="precio" class="form-label">{{ __('Precio Base') }}</label>
                <input type="text" class="form-control" value="{{ $this->formatoMoneda($precio_base) }}" readonly>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2 mb20">
                <label for="precio_venta" class="form-label" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingrese el precio base por cuña. Debe ser un valor positivo.">{{ __('Precio de Venta') }}</label>
                <input wire:model.live="precio_venta" type="text" class="form-control" id="precio_venta" placeholder="Precio de venta">
                <span class="text-muted small">{{ $this->formatoMoneda($precio_venta) }}</span>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group mb-2 mb20">
                <label for="tipo_cuna" class="form-label" data-bs-toggle="tooltip" data-bs-placement="top" title="Seleccione el tipo de pauta. La mención tiene un recargo del 30%.">{{ __('Tipo de pauta') }}</label>
                <select wire:model.live="tipo_cuna" required name="tipo_cuna" id="tipo_cuna" class="form-control">
                    <option value="">Seleccione...</option>
                    <option value="1">Cuña</option>
                    <option value="2">Mención</option>
                </select>
                @error('tipo_cuna') <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div> @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group mb-2 mb20">
                <label for="duracion" class="form-label" data-bs-toggle="tooltip" data-bs-placement="top" title="Seleccione la duración de la cuña. El precio se ajusta según el porcentaje.">{{ __('Duración') }}</label>
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
    
        <div class="col-md-2">
            <div class="form-group mb-2 mb20">
                <label for="bonificacion" class="form-label" data-bs-toggle="tooltip" data-bs-placement="top" title="La bonificación se resta del valor neto. Solo valores positivos.">{{ __('Bonificación') }}</label>
                <input wire:model.live="bonificacion" type="number" min="0" step="1" name="bonificacion" class="form-control @error('bonificacion') is-invalid @enderror" id="bonificacion" placeholder="Bonificación">
                @error('bonificacion') <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div> @enderror
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group mb-2 mb20">
                <label for="descuento" class="form-label" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingrese el porcentaje de descuento (0-100). Solo números enteros.">{{ __('Descuento') }}</label>
                <div class="input-group">
                    <input wire:model.live="descuento" type="number" min="0" step="1" name="descuento" class="form-control @error('descuento') is-invalid @enderror" id="descuento" placeholder="Descuento">
                    <span class="input-group-text">%</span>
                </div>
                @error('descuento') <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div> @enderror
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    
    
    <div class="row">
        
        <div class="col-md-12">
            <label class="form-label">{{ __('Cuñas por día de la semana') }}</label>
            <div class="row">
                @php
                    $dias = [
                        'lu' => ['label' => 'Lunes', 'activo' => $programaSeleccionado->lunes ?? false],
                        'ma' => ['label' => 'Martes', 'activo' => $programaSeleccionado->martes ?? false],
                        'mi' => ['label' => 'Miércoles', 'activo' => $programaSeleccionado->miercoles ?? false],
                        'ju' => ['label' => 'Jueves', 'activo' => $programaSeleccionado->jueves ?? false],
                        'vi' => ['label' => 'Viernes', 'activo' => $programaSeleccionado->viernes ?? false],
                        'sa' => ['label' => 'Sábado', 'activo' => $programaSeleccionado->sabado ?? false],
                        'do' => ['label' => 'Domingo', 'activo' => $programaSeleccionado->domingo ?? false],
                    ];
                @endphp
                @foreach ($dias as $key => $info)
                    @if($info['activo'])
                        <div class="col-md-2 mb-2">
                            <label for="cunas_{{ $key }}" class="form-label">{{ $info['label'] }}</label>
                            <input wire:model.live="cunas_por_dia_detalle.{{ $key }}" type="number" min="0" class="form-control" id="cunas_{{ $key }}" placeholder="0">
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

       

    </div>
    <br>

    <div class="row">

        <div class="col-md-3">
            <label class="form-label">{{ __('Total de cuñas') }}</label>
            <input type="text" class="form-control" value="{{ $this->getTotalCunasPeriodo() }}" readonly>
        </div>

    </div>

    <br>
    <br>
    <br>
    <div class="row">

        
        <div class="col-md-3">
            <label class="form-label">{{ __('Valor unitario') }}</label>
            <input type="text" class="form-control" value="{{ $this->formatoMoneda($valor_unitario) }}" readonly>
        </div>
        <div class="col-md-3">
            <label class="form-label">{{ __('Valor neto') }}</label>
            <input type="text" class="form-control" value="{{ $this->formatoMoneda($valor_neto) }}" readonly>
            <div class="col-md-3 d-flex align-items-end">
                @if($usa_iva)
                    <span class="badge bg-success text-white" aria-label="Emisora con IVA" tabindex="0">Emisora con IVA</span>
                @else
                    <span class="badge bg-secondary text-white" aria-label="Emisora sin IVA" tabindex="0">Emisora sin IVA</span>
                @endif
            </div>
        </div>
        @if($usa_iva)
        <div class="col-md-3">
            <label class="form-label">{{ __('IVA') }}</label>
            <input type="text" class="form-control" value="{{ $this->formatoMoneda($valor_iva) }}" readonly>
        </div>
        @endif
   
        @if($usa_iva)
        <div class="col-md-3">
            <label class="form-label">{{ __('Total con IVA') }}</label>
            <input type="text" class="form-control" value="{{ $this->formatoMoneda($valor_total_con_iva) }}" readonly>
        </div>
        @endif
       
    </div>
    @endif
   
    <div class="alert alert-info mt-3" role="alert">
        <strong>Resumen de cálculo:</strong><br>
        (Precio base @if($precio_venta > 0) ({{ $this->formatoMoneda($precio_venta) }}) @else ({{ $this->formatoMoneda($precio_base) }}) @endif
        @if(in_array($tipoProgramaSeleccionado, [9,10])) x 1.30 (Noticiero) @endif
        @if($tipo_cuna == 2) x 1.30 (Mención) @endif
        x {{ $duracion ?: 'Duración no seleccionada' }} (Duración)<br>
        x {{ $this->getTotalCunasPeriodo() }} (Total de cuñas)
        @if($descuento > 0) - {{ $descuento }}% (Descuento) @endif
        @if($bonificacion > 0) - {{ $this->formatoMoneda($bonificacion) }} (Bonificación) @endif
        @if($usa_iva) + 16% IVA @endif
        <br>
        <em>Valor neto final calculado según los factores seleccionados.</em>
        @if(!$duracion)
            <br><span class="text-danger">Falta seleccionar la duración.</span>
        @endif
        @if(!$tipo_cuna)
            <br><span class="text-danger">Falta seleccionar el tipo de pauta.</span>
        @endif
        @if($this->getTotalCunasPeriodo() == 0)
            <br><span class="text-danger">Falta ingresar cuñas por día.</span>
        @endif
    </div>

    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
</form>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.forEach(function (tooltipTriggerEl) {
        new bootstrap.Tooltip(tooltipTriggerEl);
    });
});
</script>