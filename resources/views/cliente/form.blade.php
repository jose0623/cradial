<div class="row padding-1 p-1">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group mb-2 mb20">
                    <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
                    <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $cliente?->nombre) }}" id="nombre" placeholder="Nombre">
                    {!! $errors->first('nombre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-2 mb20">
                    <label for="telefono" class="form-label">{{ __('Telefono') }}</label>
                    <input type="text" name="telefono" class="form-control @error('telefono') is-invalid @enderror" value="{{ old('telefono', $cliente?->telefono) }}" id="telefono" placeholder="Telefono">
                    {!! $errors->first('telefono', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-2 mb20">
                    <label for="direccion" class="form-label">{{ __('Direccion') }}</label>
                    <input type="text" name="direccion" class="form-control @error('direccion') is-invalid @enderror" value="{{ old('direccion', $cliente?->direccion) }}" id="direccion" placeholder="Direccion">
                    {!! $errors->first('direccion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-2 mb20">
                    <label for="email" class="form-label">{{ __('Email') }}</label>
                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $cliente?->email) }}" id="email" placeholder="Email">
                    {!! $errors->first('email', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>

        </div>
        
        <div class="row">
            <div class="col-md-3">
                <div class="form-group mb-2 mb20">
                    <label for="tipo_de_documento" class="form-label">{{ __('Tipo De Documento') }}</label>
                    <select name="tipo_de_documento" id="tipo_de_documento" class="form-control">
                        <option value="">Seleccione... </option>
                        <option value="1">NIT</option>
                        <option value="2">C.C</option>
                        <option value="3">C.E.</option>
                        <option value="4">T.I.</option>
                        <option value="5">OTRO</option>
                    </select>
                    {!! $errors->first('tipo_de_documento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-2 mb20">
                    <label for="nit" class="form-label">{{ __('Nit') }}</label>
                    <input type="text" name="nit" class="form-control @error('nit') is-invalid @enderror" value="{{ old('nit', $cliente?->nit) }}" id="nit" placeholder="Nit">
                    {!! $errors->first('nit', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-2 mb20">
                    <label for="plazo_en_dias" class="form-label">{{ __('Plazo En Dias') }}</label>
                    <input type="text" name="plazo_en_dias" class="form-control @error('plazo_en_dias') is-invalid @enderror" value="{{ old('plazo_en_dias', $cliente?->plazo_en_dias) }}" id="plazo_en_dias" placeholder="Plazo En Dias">
                    {!! $errors->first('plazo_en_dias', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-2 mb20">
                    <label for="tipo_cliente_id" class="form-label">{{ __('Tipo Cliente') }}</label>
        
                    <select required name="tipo_cliente_id" id="tipo_cliente_id"  class="form-control " >
                        <option value="">Seleccione...</option>
        
                        @foreach ($tipocliente as $item)
                           
                        <option 
                        @if ( $item->id == $cliente->tipo_cliente_id )
                        selected="selected"
                        @endif
                           
                            
                            value="{{ $item->id }}">{{$item->name}}</option>
        
                        @endforeach
        
                    </select>
                    {!! $errors->first('tipo_cliente_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
           
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-2 mb20">
                    @livewire('selectores')
                </div>
            </div>
        
            <div class="col-md-3">
                <div class="form-group mb-2 mb20">
                    <label for="fax" class="form-label">{{ __('Fax') }}</label>
                    <input type="text" name="fax" class="form-control @error('fax') is-invalid @enderror" value="{{ old('fax', $cliente?->fax) }}" id="fax" placeholder="Fax">
                    {!! $errors->first('fax', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-2 mb20">
                    <label for="vendedor_id" class="form-label">{{ __('Vendedor') }}</label>
                   
                    <select required name="vendedor_id" id="vendedor_id"  class="form-control " >
                        <option value="">Seleccione...</option>
        
                        @foreach ($user as $item)
                           
                        <option 
                        @if ( $item->id == $cliente->vendedor_id )
                        selected="selected"
                        @endif
                           
                            
                            value="{{ $item->id }}">{{$item->name}}</option>
        
                        @endforeach
        
                    </select>
        
        
                   
                    {!! $errors->first('vendedor_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>

        </div>
        
        <div class="row">
            <div class="col-md-12">

                <div class="form-group mb-2 mb20">
                    <label for="tipo_cliente_id" class="form-label">{{ __('Regimen') }}</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="comun" id="comun" value="1" 
                    @if(old('comun', $cliente->comun ?? false)) checked @endif>
                    <label class="form-check-label">Comun</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="simplificado" id="simplificado" value="1" 
                    @if(old('simplificado', $cliente->simplificado ?? false)) checked @endif>
                    <label class="form-check-label">Simplificado</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="gca" id="gca" value="1" 
                    @if(old('gca', $cliente->gca ?? false)) checked @endif>
                    <label class="form-check-label">Gran contribuyente autoretenedor</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="gc" id="gc" value="1" 
                    @if(old('gc', $cliente->gc ?? false)) checked @endif>
                    <label class="form-check-label">Gran contribuyente</label>
                </div>

            </div>
        </div>

<br>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>