<div>
    <!-- Select Estado -->
    <div class="mb-4">
        <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
        <select 
            wire:model.live="selectedEstado" 
            id="estado" 
            class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"
        >
            <option value="">Seleccione un estado</option>
            @foreach($estados as $estado)
                <option value="{{ $estado->id }}">{{ $estado->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Select Municipio -->
    <div class="mb-4" wire:loading.remove wire:target="selectedEstado">
        <label for="municipio" class="block text-sm font-medium text-gray-700">Municipio</label>
        <select 
            wire:model.live="selectedMunicipio" 
            id="municipio" 
            class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"
            @if(!count($municipios)) disabled @endif 
            >
            <option value="">Seleccione un municipio</option>
            @foreach($municipios as $municipio)
                <option value="{{ $municipio->id }}">{{ $municipio->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Select Tipo Programa -->
    <div class="mb-4" wire:loading.remove wire:target="selectedMunicipio">
        <label for="tipoPrograma" class="block text-sm font-medium text-gray-700">Tipo de Programa</label>
        <select 
            wire:model="selectedTipoPrograma" 
            id="tipoPrograma" 
            class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"
            @if(!count($tiposPrograma)) disabled @endif
        >
            <option value="">Seleccione un tipo de programa</option>
            @foreach($tiposPrograma as $tipo)
                <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
            @endforeach
        </select>
    </div>

    <!-- Select Emisoras -->
    <div class="mb-4" wire:loading.remove wire:target="selectedTipoPrograma">
        <label for="emisora" class="block text-sm font-medium text-gray-700">Emisora</label>
        <select 
            wire:model="selectedEmisora" 
            id="emisora" 
            class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"
            @if(!count($emisoras)) disabled @endif
        >
            <option value="">Seleccione una emisora</option>
            @foreach($emisoras as $emisora)
                <option value="{{ $emisora->id }}">{{ $emisora->nombre }}</option>
            @endforeach
        </select>
    </div>

    <!-- Select Programas de Emisora -->
    <div class="mb-4" wire:loading.remove wire:target="selectedEmisora">
        <label for="emisoraPrograma" class="block text-sm font-medium text-gray-700">Programa de la Emisora</label>
        <select 
            wire:model="selectedEmisoraPrograma" 
            id="emisoraPrograma" 
            class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"
            @if(!count($emisoraProgramas)) disabled @endif
        >
            <option value="">Seleccione un programa</option>
            @foreach($emisoraProgramas as $programa)
                <option value="{{ $programa->id }}">{{ $programa->nombre }}</option>
            @endforeach
        </select>
    </div>

    <!-- Mostrar detalles del programa seleccionado -->
    @if($programaSeleccionado)
        <div class="mt-6 p-4 bg-white shadow rounded-lg">
            <h3 class="text-lg font-medium text-gray-900">Detalles del Programa</h3>
            <div class="mt-2">
                <p><span class="font-semibold">Nombre:</span> {{ $programaSeleccionado->nombre }}</p>
                <p><span class="font-semibold">Emisora:</span> {{ $programaSeleccionado->emisora->nombre }}</p>
                <p><span class="font-semibold">Horario:</span> {{ $programaSeleccionado->horario }}</p>
                <p><span class="font-semibold">Descripción:</span> {{ $programaSeleccionado->descripcion }}</p>
                <!-- Puedes agregar más campos según necesites -->
            </div>
        </div>
    @endif

    <!-- Loading indicators -->
    <div wire:loading wire:target="selectedEstado,selectedMunicipio,selectedTipoPrograma,selectedEmisora,selectedEmisoraPrograma">
        <div class="flex justify-center items-center py-4">
            <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-gray-900"></div>
            <span class="ml-2">Cargando...</span>
        </div>
    </div>

    <!-- Mensaje cuando no hay datos -->
    @if(count($municipios) === 0 && !is_null($selectedEstado))
        <div class="mt-4 p-3 bg-yellow-50 text-yellow-800 rounded">
            No se encontraron municipios para este estado.
        </div>
    @endif
    
    @if(count($tiposPrograma) === 0 && !is_null($selectedMunicipio))
        <div class="mt-4 p-3 bg-yellow-50 text-yellow-800 rounded">
            No se encontraron tipos de programa para este municipio.
        </div>
    @endif
    
    @if(count($emisoras) === 0 && !is_null($selectedTipoPrograma))
        <div class="mt-4 p-3 bg-yellow-50 text-yellow-800 rounded">
            No se encontraron emisoras con este tipo de programa en el municipio seleccionado.
        </div>
    @endif
    
    @if(count($emisoraProgramas) === 0 && !is_null($selectedEmisora))
        <div class="mt-4 p-3 bg-yellow-50 text-yellow-800 rounded">
            No se encontraron programas para esta emisora.
        </div>
    @endif
</div>