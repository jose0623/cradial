<div>
    <!-- Barra de herramientas -->
    <div class="d-flex justify-content-between mb-3">
        <div>
            <select wire:model.live="perPage" class="form-select form-select-sm">
                <option value="10">10 por página</option>
                <option value="25">25 por página</option>
                <option value="50">50 por página</option>
                <option value="100">100 por página</option>
            </select>
        </div>
        <div class="btn-group">
            <button wire:click="exportExcel" class="btn btn-success btn-sm">
                <i class="fa fa-file-excel"></i> Excel
            </button>
            <button wire:click="exportPdf" class="btn btn-danger btn-sm">
                <i class="fa fa-file-pdf"></i> PDF
            </button>
        </div>
    </div>

    <!-- Buscador -->
    <div class="mb-3">
        <input 
            type="text" 
            wire:model.live="search" 
            class="form-control" 
            placeholder="Buscar programas por nombre, locutor, horario o tipo..."
        >
    </div>

    <!-- Tabla de resultados -->
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>    
                    <th>Nº</th>
                    <th wire:click="sortBy('nombre_programa')" style="cursor: pointer;">
                        Programa
                        @if($sortField === 'nombre_programa')
                            @if($sortDirection === 'asc')
                                <i class="fa fa-sort-up"></i>
                            @else
                                <i class="fa fa-sort-down"></i>
                            @endif
                        @else
                            <i class="fa fa-sort"></i>
                        @endif
                    </th>
                    <th>Tipo</th>
                    <th>L</th>
                    <th>M</th>
                    <th>MI</th>
                    <th>J</th>
                    <th>V</th>
                    <th>S</th>
                    <th>D</th>
                    <th wire:click="sortBy('horario')" style="cursor: pointer;">
                        Horario
                        @if($sortField === 'horario')
                            @if($sortDirection === 'asc')
                                <i class="fa fa-sort-up"></i>
                            @else
                                <i class="fa fa-sort-down"></i>
                            @endif
                        @else
                            <i class="fa fa-sort"></i>
                        @endif
                    </th>
                    <th>Locutor</th>
                    <th>Act</th>
                    <th wire:click="sortBy('costo')" style="cursor: pointer;">
                        Costo
                        @if($sortField === 'costo')
                            @if($sortDirection === 'asc')
                                <i class="fa fa-sort-up"></i>
                            @else
                                <i class="fa fa-sort-down"></i>
                            @endif
                        @else
                            <i class="fa fa-sort"></i>
                        @endif
                    </th>
                    <th style="text-align: right;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($emisoraProgramas as $index => $emisoraPrograma)
                    <tr>
                        <td>{{$emisoraProgramas->firstItem() + $index  }}</td>
                        <td>{{ $emisoraPrograma->nombre_programa }}</td>
                        <td>{{ $emisoraPrograma->tipoPrograma->name ?? 'N/A' }}</td>
                        <td>{{ $emisoraPrograma->lunes ? '✓' : '' }}</td>
                        <td>{{ $emisoraPrograma->martes ? '✓' : '' }}</td>
                        <td>{{ $emisoraPrograma->miercoles ? '✓' : '' }}</td>
                        <td>{{ $emisoraPrograma->jueves ? '✓' : '' }}</td>
                        <td>{{ $emisoraPrograma->viernes ? '✓' : '' }}</td>
                        <td>{{ $emisoraPrograma->sabado ? '✓' : '' }}</td>
                        <td>{{ $emisoraPrograma->domingo ? '✓' : '' }}</td>
                        <td>{{ $emisoraPrograma->horario }}</td>
                        <td>{{ $emisoraPrograma->nombre_locutor }}</td>
                        <td>{{ $emisoraPrograma->activo ? '✓' : '' }}</td>
                        <td>{{ number_format($emisoraPrograma->costo, 2) }}</td>
                        <td style="min-width: 240px;text-align: right;">
                            <form action="{{ route('emisora.programas.destroy', $emisoraPrograma->id) }}" method="POST"  style="margin: 0;">
                                <a class="btn btn-sm btn-primary " href="{{ route('emisora.programas.show', $emisoraPrograma->id) }}">
                                    <i class="fa fa-fw fa-eye"></i>
                                </a>
                                <a class="btn btn-sm btn-success" href="{{ route('emisora.programas.edit', $emisoraPrograma->id) }}">
                                    <i class="fa fa-fw fa-edit"></i>
                                </a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('¿Estás seguro de eliminar?') ? this.closest('form').submit() : false;">
                                    <i class="fa fa-fw fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="14" class="text-center">No se encontraron programas</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="d-flex justify-content-between align-items-center mt-3">
        <div>
            Mostrando {{ $emisoraProgramas->firstItem() }} a {{ $emisoraProgramas->lastItem() }} de {{ $emisoraProgramas->total() }} registros
        </div>
        {{ $emisoraProgramas->links() }}
    </div>
</div>