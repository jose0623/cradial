<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('Nombre') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $municipio?->name) }}" id="name" placeholder="Nombre">
            {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="estado_id" class="form-label">{{ __('Departamento') }}</label>


            <select required name="estado_id" id="municipio"  class="form-control " >
                <option value="">Seleccione el Estado</option>

                @foreach ($estados as $item)
                   
                   <option 
                   @if ( $item->id == $municipio->estado_id )
                   selected="selected"
                   @endif
                   
                    
                    value="{{ $item->id }}">{{$item->name}}</option>

                @endforeach

            </select>

            {!! $errors->first('estado_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
    </div>
</div>