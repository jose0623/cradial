<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $estado?->name) }}" id="name" placeholder="Name">
            {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="pais_id" class="form-label">{{ __('Pais Id') }}</label>
           
            <select required name="idpais" id="pais"  class="form-control " >
                <option value="">Seleccione el Pais</option>

                @foreach ($paises as $item)
                   
                   <option 
                   @if ( $item->id == $estado->pais_id )
                   selected="selected"
                   @endif
                   
                    
                    value="{{ $item->id }}">{{$item->name}}</option>

                @endforeach

            </select>
            {!! $errors->first('pais_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>