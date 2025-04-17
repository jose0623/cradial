<div>

    <div class="row">
        <div class="col-10">
            <!-- Buscador -->
            <div class="mb-3">
                <input 
                    type="text" 
                    wire:model.live="search" 
                    class="form-control" 
                    placeholder="Buscar tipo de emisora..."
                >
            </div>
        </div>
        <div class="col-2">
            <!-- Barra de herramientas -->
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
    
    

    <!-- Tabla de resultados -->
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>N°</th>
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
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tipoEmisoras  as $index => $tipoEmisora)
                    <tr>
                        <td>{{ $tipoEmisoras->firstItem() + $index }}</td> <!-- Numeración consecutiva -->
                        <td>{{ $tipoEmisora->name }}</td>
                        <td>
                            <form action="{{ route('tipo-emisoras.destroy', $tipoEmisora->id) }}" method="POST">
                                <a class="btn btn-sm btn-primary" href="{{ route('tipo-emisoras.show', $tipoEmisora->id) }}">
                                    <i class="fa fa-eye"></i> Ver
                                </a>
                                <a class="btn btn-sm btn-success" href="{{ route('tipo-emisoras.edit', $tipoEmisora->id) }}">
                                    <i class="fa fa-edit"></i> Editar
                                </a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('¿Estás seguro de eliminar?') ? this.closest('form').submit() : false;">
                                    <i class="fa fa-trash"></i> Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="text-center">No se encontraron resultados</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="d-flex justify-content-between align-items-center mt-3">
        <div>
            Mostrando {{ $tipoEmisoras->firstItem() }} a {{ $tipoEmisoras->lastItem() }} de {{ $tipoEmisoras->total() }} registros
        </div>
        {{ $tipoEmisoras->links() }}
    </div>
</div>