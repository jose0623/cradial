<div>
    
    <div class="row">
        <div class="col-md-10">
            <div class="row mb-3">
                <div class="col-md-2">
                    <input 
                        type="text" 
                        wire:model.live="search" 
                        class="form-control form-control-sm" 
                        placeholder="Nombre o dial..."
                    >
                </div>
                <div class="col-md-2">
                    <select wire:model.live="selectedEstado" class="form-control form-control-sm">
                        <option value="">Departamentos</option>
                        @foreach($estados as $estado)
                            <option value="{{ $estado->id }}">{{ $estado->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <select wire:model.live="selectedMunicipio" class="form-control form-control-sm" {{ !$selectedEstado ? 'disabled' : '' }}>
                        <option value="">Municipios</option>
                        @foreach($municipios as $municipio)
                            <option value="{{ $municipio->id }}">{{ $municipio->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <select wire:model.live="selectedTipoEmisora" class="form-control form-control-sm">
                        <option value="">Todos los tipos</option>
                        @foreach($tiposEmisora as $tipo)
                            <option value="{{ $tipo->id }}">{{ $tipo->name }}</option>
                        @endforeach
                    </select>
                </div>
                {{-- NUEVO FILTRO: Emisora Activa --}}
                <div class="col-md-2"> {{-- Añade un pequeño margen superior si es necesario --}}
                    <select wire:model.live="filterActiva" class="form-control form-control-sm">
                        <option value="">Todas las emisoras</option>
                        <option value="1">Activas</option>
                        <option value="0">Inactivas</option>
                    </select>
                </div>
                {{-- FIN NUEVO FILTRO --}}
            </div>
        </div>
        <div class="col-md-2">
             <div class="d-flex justify-content-between mb-3">
                    <div class="btn-group">
                        <button wire:click="exportExcel" class="btn btn-success btn-sm">
                            <i class="fa fa-file-excel"></i> Excel
                        </button>
                        <button wire:click="exportPdf" class="btn btn-danger btn-sm">
                            <i class="fa fa-file-pdf"></i> PDF
                        </button>
                    </div>
                </div>
        </div>
    </div>
    

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Nº </th>
                    <th wire:click="sortBy('name')" style="cursor: pointer;">
                        Nombre 
                        @if($sortField === 'name')
                            @if($sortDirection === 'asc')
                                <i class="fa fa-sort-up"></i>
                            @else
                                <i class="fa fa-sort-down"></i>
                            @endif
                        @else
                            <i class="fa fa-sort"></i>
                        @endif
                    </th>
                    <th wire:click="sortBy('dial')" style="cursor: pointer;">
                        Dial
                        @if($sortField === 'dial')
                            @if($sortDirection === 'asc')
                                <i class="fa fa-sort-up"></i>
                            @else
                                <i class="fa fa-sort-down"></i>
                            @endif
                        @else
                            <i class="fa fa-sort"></i>
                        @endif
                    </th>
                    <th>Tipo Emisora</th>
                    <th>Departamento</th>
                    <th>Municipio</th>
                    {{-- NUEVAS COLUMNAS --}}
                    <th wire:click="sortBy('emisora_activa')" style="cursor: pointer;">
                        Estado
                        @if($sortField === 'emisora_activa')
                            @if($sortDirection === 'asc')
                                <i class="fa fa-sort-up"></i>
                            @else
                                <i class="fa fa-sort-down"></i>
                            @endif
                        @else
                            <i class="fa fa-sort"></i>
                        @endif
                    </th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($emisoras as $index =>  $emisora)
                    <tr>
                        <td>{{ $emisoras->firstItem() + $index }}</td>
                        <td>{{ $emisora->name }}</td>
                        <td>{{ $emisora->dial }}</td>
                        <td>{{ $emisora->tipoEmisora->name ?? 'N/A' }}</td>
                        <td>{{ $emisora->municipio->estado->name ?? 'N/A' }}</td>
                        <td>{{ $emisora->municipio->name ?? 'N/A' }}</td>
                        {{-- NUEVAS CELDAS DE DATOS --}}
                        <td>
                            @if($emisora->emisora_activa)
                                <span class="badge bg-success">Activa</span>
                            @else
                                <span class="badge bg-danger">Inactiva</span>
                                @if($emisora->observacion_estado_emisora)
                                    <i class="fa fa-info-circle text-muted" title="{{ $emisora->observacion_estado_emisora }}"></i>
                                @endif
                            @endif
                        </td>
                        {{-- FIN NUEVAS CELDAS DE DATOS --}}
                        <td>
                            <div class="btn-group" role="group">
                                <a class="btn btn-sm btn-primary" href="{{ route('cobertura', $emisora->id) }}" title="Cobertura">
                                    <i class="fa fa-signal"></i>
                                </a>
                                <a class="btn btn-sm btn-info" href="{{ route('emisora.programas.index', $emisora->id) }}" title="Programas">
                                    <i class="fa fa-film"></i>
                                </a>
                                <a class="btn btn-sm btn-dark" href="{{ route('emisora.fiestas.index', $emisora->id) }}" title="Fiestas">
                                    <i class="fa fa-gifts"></i>
                                </a>
                                <a class="btn btn-sm btn-primary" href="{{ route('emisoras.show', $emisora->id) }}" title="Ver">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a class="btn btn-sm btn-success" href="{{ route('emisoras.edit', $emisora->id) }}" title="Editar">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <button 
                                    type="button" 
                                    class="btn btn-sm btn-danger"
                                    onclick="confirm('¿Estás seguro de eliminar?') && Livewire.dispatch('deleteEmisora', {id: {{ $emisora->id }}})"
                                    title="Eliminar"
                                >
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No se encontraron resultados</td> {{-- Cambia el colspan si añades más columnas --}}
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-between align-items-center mt-3">
        <div>
            Mostrando {{ $emisoras->firstItem() }} a {{ $emisoras->lastItem() }} de {{ $emisoras->total() }} registros
        </div>
        {{ $emisoras->links() }}
    </div>
</div>
