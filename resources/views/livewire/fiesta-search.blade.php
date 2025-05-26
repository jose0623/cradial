<div>
    <!-- Barra de herramientas -->
    <div class="d-flex justify-content-between mb-3">
        <div>
            <select wire:model.live="perPage" class="form-select form-select-sm">
                <option value="10">10 por página</option>
                <option value="20">20 por página</option>
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
            placeholder="Buscar fiestas por nombre, fecha o emisora..."
        >
    </div>

    <!-- Tabla de resultados -->
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Nº</th>
                    <th wire:click="sortBy('nombre')" style="cursor: pointer;">
                        Nombre
                        @if($sortField === 'nombre')
                            @if($sortDirection === 'asc')
                                <i class="fa fa-sort-up"></i>
                            @else
                                <i class="fa fa-sort-down"></i>
                            @endif
                        @else
                            <i class="fa fa-sort"></i>
                        @endif
                    </th>
                    <th wire:click="sortBy('fecha')" style="cursor: pointer;">
                        Fecha
                        @if($sortField === 'fecha')
                            @if($sortDirection === 'asc')
                                <i class="fa fa-sort-up"></i>
                            @else
                                <i class="fa fa-sort-down"></i>
                            @endif
                        @else
                            <i class="fa fa-sort"></i>
                        @endif
                    </th>
                    <th>Emisora</th>
                    <th style="text-align: right;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($fiestas as $index => $fiesta)
                    <tr>
                        <td>{{$fiestas->firstItem() + $index  }}</td>
                        <td>{{ $fiesta->nombre }}</td>
                        <td>{{ $fiesta->fecha }}</td>
                        <td>{{ $fiesta->emisora->name ?? 'N/A' }}</td>
                        <td style="min-width: 240px;text-align: right;" >
                            <form action="{{ route('emisora.fiestas.destroy', $fiesta->id) }}" method="POST"  style="margin: 0;">
                                <a class="btn btn-sm btn-primary " href="{{ route('emisora.fiestas.show', $fiesta->id) }}">
                                    <i class="fa fa-fw fa-eye"></i>
                                </a>
                                <a class="btn btn-sm btn-success" href="{{ route('emisora.fiestas.edit', $fiesta->id) }}">
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
                        <td colspan="4" class="text-center">No se encontraron fiestas</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="d-flex justify-content-between align-items-center mt-3">
        <div>
            Mostrando {{ $fiestas->firstItem() }} a {{ $fiestas->lastItem() }} de {{ $fiestas->total() }} registros
        </div>
        {{ $fiestas->links() }}
    </div>
</div>