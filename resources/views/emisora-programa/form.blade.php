<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="row">
            <div class="col-md-4">
                <input type="hidden" name="id_emisora"  value="{{ $id_emisora }}" >
                <div class="form-group mb-2 mb20">
                    <label for="nombre_programa" class="form-label">{{ __('Nombre Programa') }}</label>
                    <input type="text" name="nombre_programa" class="form-control @error('nombre_programa') is-invalid @enderror" value="{{ old('nombre_programa', $emisoraPrograma?->nombre_programa) }}" id="nombre_programa" placeholder="Nombre Programa">
                    {!! $errors->first('nombre_programa', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="tipo_programa_id" class="form-label">{{ __('Tipo Programa') }}</label>
                    
                    

                    <select required name="tipo_programa_id" id="tipo_programa_id"  class="form-control " >
                        <option value="">Seleccione ...</option>
                       
                        @foreach ($tipoPrograma as $item)

                           <option 
                           @if ( $item->id == $emisoraPrograma->tipo_programa_id )
                           selected="selected"
                           @endif
                            value="{{ $item->id }}">{{$item->name}}</option>

                        @endforeach
        
                    </select>
                    
                    
                    {!! $errors->first('tipo_programa_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="horario" class="form-label">{{ __('Horario') }}</label>
                    <input type="text" name="horario" class="form-control @error('horario') is-invalid @enderror" value="{{ old('horario', $emisoraPrograma?->horario) }}" id="horario" placeholder="Horario">
                    {!! $errors->first('horario', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="nombre_locutor" class="form-label">{{ __('Nombre Locutor') }}</label>
                    <input type="text" name="nombre_locutor" class="form-control @error('nombre_locutor') is-invalid @enderror" value="{{ old('nombre_locutor', $emisoraPrograma?->nombre_locutor) }}" id="nombre_locutor" placeholder="Nombre Locutor">
                    {!! $errors->first('nombre_locutor', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="activo" class="form-label">{{ __('Activo') }}</label>



                    <select required name="activo" id="activo"  class="form-control " >
                        <option value="">Seleccione ...</option>
        
                       
                           
                           <option 
                           @if ( $emisoraPrograma->activo == 1 ) selected="selected"
                           @endif
                             value="1">Si</option>
                             <option 
                            @if ( $emisoraPrograma->activo == 0 ) selected="selected"
                            @endif
                             value="0">no</option>

        
                    </select>
                    

                  
                    {!! $errors->first('activo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="costo" class="form-label">{{ __('Costo') }}</label>
                    <input type="number" name="costo" class="form-control @error('costo') is-invalid @enderror" value="{{ old('costo', $emisoraPrograma?->costo) }}" id="costo" step="0.01" placeholder="0.00">
                    {!! $errors->first('costo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>

            <div class="col-md-12">

                <div class="form-group mb-2 mb20">
                    <label for="activo" class="form-label">{{ __('Dias de la Programación') }}</label>
                </div>



                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="lunes" id="lunes" value="1" 
                    @if(old('lunes', $emisoraPrograma->lunes ?? false)) checked @endif>
                    <label class="form-check-label">Lunes</label>
                </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="martes" id="martes" value="1"
                    @if(old('lunes', $emisoraPrograma->martes ?? false)) checked @endif>
                    <label class="form-check-label ">Martes</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="miercoles" id="miercoles" value="1"
                    @if(old('lunes', $emisoraPrograma->miercoles ?? false)) checked @endif>
                    <label class="form-check-label ">Miercoles</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="jueves" id="jueves" value="1"
                    @if(old('lunes', $emisoraPrograma->jueves ?? false)) checked @endif>
                    <label class="form-check-label ">Jueves</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="viernes" id="viernes" value="1"
                    @if(old('lunes', $emisoraPrograma->viernes ?? false)) checked @endif>
                    <label class="form-check-label ">Viernes</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="sabado" id="sabado" value="1"
                    @if(old('lunes', $emisoraPrograma->sabado ?? false)) checked @endif>
                    <label class="form-check-label ">Sabado</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="domingo" id="domingo" value="1"
                    @if(old('lunes', $emisoraPrograma->domingo ?? false)) checked @endif>
                    <label class="form-check-label ">Domingo</label>
                  </div>

            </div>
        </div>


    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>