<div>

    <div class="row">
        <div class="col-md-10">
            <!-- Buscador (se mantiene igual) -->
            <div class="mb-3">
                <input 
                    type="text" 
                    wire:model.live="search" 
                    class="form-control" 
                    placeholder="Buscar por nombre o país..."
                    autofocus
                >
                @if($search)
                    <small class="text-muted">Buscando: "{{ $search }}"</small>
                @endif
            </div>
        </div>
        <div class="col-md-2">
                 <!-- Barra de herramientas (arriba del buscador) -->
                <div class="d-flex justify-content-between mb-3">
                    <div></div> <!-- Espacio vacío para alinear a la derecha -->
                    <div class="btn-group">
                        <button wire:click="exportExcel" class="btn btn-success btn-sm">
                            <i class="fas fa-file-excel"></i> Excel
                        </button>
                        <button wire:click="exportPdf" class="btn btn-danger btn-sm">
                            <i class="fas fa-file-pdf"></i> PDF
                        </button>
                    </div>
                </div>
        </div>
    </div>
   




    

    <!-- Tabla de resultados -->
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>N°</th> <!-- Nueva columna -->
                    <th wire:click="sortBy('name')" style="cursor: pointer;">
                        Nombre 
                        @if($sortField === 'name')
                            @if($sortDirection === 'asc')
                                <i class="fas fa-sort-up"></i>
                            @else
                                <i class="fas fa-sort-down"></i>
                            @endif
                        @else
                            <i class="fas fa-sort"></i>
                        @endif
                    </th>
                    <th>País</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($estados as $index => $estado)
                    <tr>
                        <td>{{ $estados->firstItem() + $index }}</td> <!-- Numeración consecutiva -->
                        <td>{{ $estado->name }}</td>
                        <td>{{ $estado->paise->name ?? 'N/A' }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('estados.show', $estado->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('estados.edit', $estado->id) }}" class="btn btn-sm btn-success">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button 
                                    wire:click="confirmDelete({{ $estado->id }})" 
                                    class="btn btn-sm btn-danger"
                                >
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No se encontraron resultados</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Paginación (se mantiene igual) -->
    <div class="d-flex justify-content-between align-items-center">
        <div>
            Mostrando {{ $estados->firstItem() }} a {{ $estados->lastItem() }} de {{ $estados->total() }} registros
        </div>
        {{ $estados->links() }}
    </div>
</div>