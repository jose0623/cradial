<div>

    <div class="row">
        <div class="col-md-10">
            <!-- Buscador -->
            <div class="mb-3">
                <input 
                    type="text" 
                    wire:model.live="search" 
                    class="form-control" 
                    placeholder="Buscar por municipio o estado..."
                >
            </div>
        </div>
        <div class="col-md-2">
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
                    <th>N°</th> <!-- Nueva columna -->
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
                    <th>Estado</th>
                    <th style=" text-align: right; padding-right: 34px !important;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($municipios as $index => $municipio)
                    <tr>
                        <td>{{ $municipios->firstItem() + $index }}</td> <!-- Numeración consecutiva -->
                        <td>{{ $municipio->name }}</td>
                        <td>{{ $municipio->estado->name ?? 'N/A' }}</td>
                        <td>
                            <form action="{{ route('municipios.destroy', $municipio->id) }}" method="POST">
                                <a class="btn btn-sm btn-primary" href="{{ route('municipios.show', $municipio->id) }}">
                                    <i class="fa fa-eye"></i> Ver
                                </a>
                                <a class="btn btn-sm btn-success" href="{{ route('municipios.edit', $municipio->id) }}">
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
                        <td colspan="3" class="text-center">No se encontraron resultados</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="d-flex justify-content-between align-items-center mt-3">
        <div>
            Mostrando {{ $municipios->firstItem() }} a {{ $municipios->lastItem() }} de {{ $municipios->total() }} registros
        </div>
        {{ $municipios->links() }}
    </div>
</div>