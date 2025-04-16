<div>

    <div class="card-header">
        <div style="display: flex; justify-content: space-between; align-items: center;">

            @foreach ($emisoras as $emisora)
                @if ($emisora->id == $id_emisora)
                <span id="card_title">
                    Cobertura de la Emisora: <b> {{ $emisora->name }} </b>
                </span>
                @endif
            @endforeach


            @foreach ($emisoras as $emisora)
        @endforeach

        </div>
    </div>
    <br>
    <br>

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if (session()->has('message'))
                <div class="alert alert-success m-4">
                    <p> {{ session('message') }}</p>
                </div>
                @endif

                <form wire:submit.prevent="save">
                
                        <div class="row">
                            <div class="col-md-12">
                                <div>
                                    <label for="estado_id">Estado:</label>
                                    <select class="form-control" wire:model.live="estado_id" id="estado_id">
                                        <option value="">Selecciona un estado</option>
                                        @foreach ($estados as $estado)
                                            <option value="{{ $estado->id }}">{{ $estado->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                
                                <div>
                                    <br>
                                    <label for="municipios">Municipios:</label>
                                    <select class="form-control" wire:model="selectedMunicipios" id="municipios" multiple>
                                        @foreach ($municipios as $municipio)
                                            <option value="{{ $municipio->id }}" {{ in_array($municipio->id, $selectedMunicipiosIds) ? 'disabled' : '' }}>
                                                {{ $municipio->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                
                            </div>
                            <div class="col-md-12">
                                <br>
                                <button  class="btn btn-primary" type="submit">Guardar</button>
                            </div>
                        </div>
                
                    </form>
                  

                  
            </div>
           
            <div class="col-md-12">
                <br>
                <br>
                <h2>Registros</h2>
                @php
                    $itenss = 1;
                @endphp
                <div class="card-body bg-white">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
            
                                <th>No</th>
                                <th >Estado</th>
                                <th >Municipios</th>
                                <th>Porcentaje de Cobertura </th>
                                <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                
                                @foreach ($regiones->groupBy('municipio.estado_id') as $estado_id => $regiones_por_estado)
                                @php
                                    $totalMunicipios = \App\Models\Municipio::where('estado_id', $estado_id)->count();
                                    $seleccionados = $regiones_por_estado->count();
                                    $porcentaje = $totalMunicipios ? ($seleccionados / $totalMunicipios) * 100 : 0;
                                    @endphp
                                
                                <tr>
                                    <td> {{$itenss}} </td>
                                    <td colspan="1"><strong>{{ $estados->find($estado_id)->name ?? 'Desconocido' }}</strong></td>
                                    <td> - </td>
                                    <td> {{ number_format($porcentaje, 2) }}% </td>
                                    <td> - </td>
                                </tr>
                                
                                @foreach ($regiones_por_estado as $region)
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>{{ $region->municipio->name }}</td>
                                        <td></td>
                                        <td>
                                            <button class="btn btn-danger" wire:click="delete({{ $region->id }})">Eliminar</button>
                                        </td>
                                    </tr>
                                @endforeach
                                @php
                                    $itenss++;
                                @endphp 
                                    
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>
    </div>

   





</div>
