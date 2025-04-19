<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="row">
            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="name" class="form-label">{{ __('Nombre') }}</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $emisora?->name) }}" id="name" placeholder="Name">
                    {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="potencia" class="form-label">{{ __('Potencia') }}</label>
                    <input type="text" name="potencia" class="form-control @error('potencia') is-invalid @enderror" value="{{ old('potencia', $emisora?->potencia) }}" id="potencia" placeholder="Potencia">
                    {!! $errors->first('potencia', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="dial" class="form-label">{{ __('Dial') }}</label>
                    <input type="text" name="dial" class="form-control @error('dial') is-invalid @enderror" value="{{ old('dial', $emisora?->dial) }}" id="dial" placeholder="Dial">
                    {!! $errors->first('dial', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="tipo_emisoras_id" class="form-label">{{ __('Tipo Emisoras') }}</label>
                    
                    <select required name="tipo_emisoras_id" id="tipo_emisoras_id"  class="form-control " >
                        <option value="">Seleccione...</option>
        
                        @foreach ($tipoEmisora as $item)
                           
                        <option 
                        @if ( $item->id == $emisora->tipo_emisoras_id )
                        selected="selected"
                        @endif
                           
                            
                            value="{{ $item->id }}">{{$item->name}}</option>
        
                        @endforeach
        
                    </select>
                    
                    {!! $errors->first('tipo_emisoras_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="tipo_documento" class="form-label">{{ __('Tipo Documento') }}</label>
        
                    <select name="tipo_documento" id="tipo_documento" class="form-control">


                        <option value="">Seleccione... </option>
                        <option value="1" {{ $emisora->tipo_documento == 1 ? 'selected="selected"' : '' }}>NIT</option>
                        <option value="2" {{ $emisora->tipo_documento == 2 ? 'selected="selected"' : '' }}>C.C</option>
                        <option value="3" {{ $emisora->tipo_documento == 3 ? 'selected="selected"' : '' }}>C.E.</option>
                        <option value="4" {{ $emisora->tipo_documento == 4 ? 'selected="selected"' : '' }}>T.I.</option>
                        <option value="5" {{ $emisora->tipo_documento == 5 ? 'selected="selected"' : '' }}>OTRO</option>
                    
                    
                    </select>
                    {!! $errors->first('tipo_documento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="identificacion" class="form-label">{{ __('Identificacion') }}</label>
                    <input type="text" name="identificacion" class="form-control @error('identificacion') is-invalid @enderror" value="{{ old('identificacion', $emisora?->identificacion) }}" id="identificacion" placeholder="Identificacion">
                    {!! $errors->first('identificacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
            

                        
        </div>
        <div class="row">
            
            <div class="col-md-8">
                @livewire('selectores', ['municipioId' => $emisora->municipio_id])
            </div>

            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="direccion" class="form-label">{{ __('Direccion') }}</label>
                    <input type="text" name="direccion" class="form-control @error('direccion') is-invalid @enderror" value="{{ old('direccion', $emisora?->direccion) }}" id="direccion" placeholder="Direccion">
                    {!! $errors->first('direccion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
        </div>
        

       <br>
       <br>
       <h3>Característica</h3>
       <br>

        <div class="row">

                <div class="col-md-3">
                    <div class="form-group mb-2 mb20">
                        <label for="tiene_real_audio" class="form-label">{{ __('Tiene Real Audio') }}</label>
                        <select name="tiene_real_audio" id="tiene_real_audio" class="form-control">
                            <option value="">Seleccione... </option>
                            <option value="1" {{ $emisora->tiene_real_audio == 1 ? 'selected="selected"' : '' }} >Si</option>
                            <option value="0" {{ $emisora->tiene_real_audio == 0 ? 'selected="selected"' : '' }} >No</option>
                        </select>
                        {!! $errors->first('tiene_real_audio', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group mb-2 mb20">
                        <label for="real_audio" class="form-label">{{ __('Real Audio') }}</label>
                        <input type="text" name="real_audio" class="form-control @error('real_audio') is-invalid @enderror" value="{{ old('real_audio', $emisora?->real_audio) }}" id="real_audio" placeholder="Real Audio">
                        {!! $errors->first('real_audio', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group mb-2 mb20">
                        <label for="descripcion_real_audio" class="form-label">{{ __('Descripcion del Real Audio') }}</label>
                        <input type="text" name="descripcion_real_audio" class="form-control @error('descripcion_real_audio') is-invalid @enderror" value="{{ old('descripcion_real_audio', $emisora?->descripcion_real_audio) }}" id="descripcion_real_audio" placeholder="Descripcion Real Audio">
                        {!! $errors->first('descripcion_real_audio', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                    </div>
                </div>
            
        </div>
       <div class="row">
            <div class="col-md-3">
                <div class="form-group mb-2 mb20">
                    <label for="utiliza_remoto" class="form-label">{{ __('Utiliza Remoto?') }}</label>
                    
                    <select name="utiliza_remoto" id="utiliza_remoto" class="form-control">
                        <option value="">Seleccione... </option>
                        <option value="1" {{ $emisora->utiliza_remoto == 1 ? 'selected="selected"' : '' }} >Si</option>
                        <option value="0" {{ $emisora->utiliza_remoto == 0 ? 'selected="selected"' : '' }} >No</option>
                    </select>
                    {!! $errors->first('utiliza_remoto', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-2 mb20">
                    <label for="tarifa_remoto" class="form-label">{{ __('Tarifa Remoto') }}</label>
                    <input type="text" name="tarifa_remoto" class="moneda form-control @error('tarifa_remoto') is-invalid @enderror" value="{{ old('tarifa_remoto', $emisora?->tarifa_remoto) }}" id="tarifa_remoto" placeholder="Tarifa Remoto">
                    {!! $errors->first('tarifa_remoto', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-2 mb20">
                    <label for="Tiempo_remoto" class="form-label">{{ __('Tiempo del Remoto') }}</label>
                    <input type="text" name="tiempo_remoto" class="form-control @error('tiempo_remoto') is-invalid @enderror" value="{{ old('tiempo_remoto', $emisora?->tiempo_remoto) }}" id="tiempo_remoto" placeholder="Tiempo remoto">
                    {!! $errors->first('tiempo_remoto', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-2 mb20">
                    <label for="descripcion_remoto" class="form-label">{{ __('Descripcion del Remoto') }}</label>
                    <input type="text" name="descripcion_remoto" class="form-control @error('descripcion_remoto') is-invalid @enderror" value="{{ old('descripcion_remoto', $emisora?->descripcion_remoto) }}" id="Descripcion remoto" placeholder="Descripcion remoto">
                    {!! $errors->first('descripcion_remoto', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-md-3">
                <div class="form-group mb-2 mb20">
                    <label for="utiliza_perifoneo" class="form-label">{{ __('Utiliza Perifoneo') }}</label>
                    <select name="utiliza_perifoneo" id="utiliza_perifoneo" class="form-control">
                        <option value="">Seleccione... </option>
                        <option value="1" {{ $emisora->utiliza_perifoneo == 1 ? 'selected="selected"' : '' }}>Si</option>
                        <option value="0" {{ $emisora->utiliza_perifoneo == 0 ? 'selected="selected"' : '' }}>No</option>
                    </select>
                    {!! $errors->first('utiliza_perifoneo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-2 mb20">
                    <label for="tarifa_perifoneo" class="form-label">{{ __('Tarifa Perifoneo') }}</label>
                    <input type="text" name="tarifa_perifoneo" class=" moneda form-control @error('tarifa_perifoneo') is-invalid @enderror" value="{{ old('tarifa_perifoneo', $emisora?->tarifa_perifoneo) }}" id="tarifa_perifoneo" placeholder="Tarifa Perifoneo">
                    {!! $errors->first('tarifa_perifoneo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-2 mb20">
                    <label for="Tiempo_perifoneo" class="form-label">{{ __('Tiempo del Perifoneo') }}</label>
                    <input type="text" name="tiempo_perifoneo" class="form-control @error('tiempo_perifoneo') is-invalid @enderror" value="{{ old('tiempo_perifoneo', $emisora?->tiempo_perifoneo) }}" id="tiempo_perifoneo" placeholder="Tiempo perifoneo">
                    {!! $errors->first('tiempo_perifoneo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-2 mb20">
                    <label for="descripcion_perifoneo" class="form-label">{{ __('Descripcion del Perifoneo') }}</label>
                    <input type="text" name="descripcion_perifoneo" class="form-control @error('descripcion_perifoneo') is-invalid @enderror" value="{{ old('descripcion_perifoneo', $emisora?->descripcion_perifoneo) }}" id="descripcion_perifoneo" placeholder="Descripcion perifoneo">
                    {!! $errors->first('descripcion_perifoneo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>

        </div>
        

        
       <div class="row">
            <div class="col-md-3">
                <div class="form-group mb-2 mb20">
                    <label for="web" class="form-label">{{ __('Web') }}</label>
                    <input type="text" name="web" class="form-control @error('web') is-invalid @enderror" value="{{ old('web', $emisora?->web) }}" id="web" placeholder="Web">
                    {!! $errors->first('web', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-2 mb20">
                    <label for="clase_pauta" class="form-label">{{ __('Pauta que no puede emitir la emisora?') }}</label>
                    <input type="text" name="clase_pauta" class="form-control @error('clase_pauta') is-invalid @enderror" value="{{ old('clase_pauta', $emisora?->clase_pauta) }}" id="clase_pauta" placeholder="Clase Pauta">
                    {!! $errors->first('clase_pauta', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-2 mb20">
                    <label for="licencia_funcionamiento" class="form-label">{{ __('Licencia Funcionamiento') }}</label>
                    <input type="text" name="licencia_funcionamiento" class="form-control @error('licencia_funcionamiento') is-invalid @enderror" value="{{ old('licencia_funcionamiento', $emisora?->licencia_funcionamiento) }}" id="licencia_funcionamiento" placeholder="Licencia Funcionamiento">
                    {!! $errors->first('licencia_funcionamiento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>

        <div class="col-md-3">
            <div class="form-group mb-2 mb20">
                <label for="afiliacion_id" class="form-label">{{ __('Afiliacion') }}</label>
                
                <select required name="afiliacion_id" id="afiliacion_id"  class="form-control " >
                    <option value="">Seleccione...</option>
    
                    @foreach ($tipoAfiliacione as $item)
                       
                    <option 
                    @if ( $item->id == $emisora->afiliacion_id )
                    selected="selected"
                    @endif
                       
                        
                        value="{{ $item->id }}">{{$item->name}}</option>
    
                    @endforeach
    
                </select>
                {!! $errors->first('afiliacion_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
        </div>

       </div>

       <div class="row">
        <div class="col-md-3">
            <div class="form-group mb-2 mb20">
                <label for="cantidad_minima" class="form-label">{{ __('Cantidad Minima (Cuñas o valor)') }}</label>
                <input type="text" name="cantidad_minima" class="form-control @error('cantidad_minima') is-invalid @enderror" value="{{ old('cantidad_minima', $emisora?->cantidad_minima) }}" id="cantidad_minima" placeholder="Cantidad minima Cuñas">
                {!! $errors->first('cantidad_minima', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group mb-2 mb20">
                <label for="iva" class="form-label">{{ __('Iva') }}</label>
                <select name="iva" id="iva" class="form-control">
                    <option value="">Seleccione... </option>
                    <option value="1" {{ $emisora->iva == 1 ? 'selected="selected"' : '' }} >Si</option>
                    <option value="0" {{ $emisora->iva == 0 ? 'selected="selected"' : '' }} >No</option>
                </select>
                {!! $errors->first('iva', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group mb-2 mb20">
                <label for="nombre_periodico" class="form-label">{{ __('Nombre Periodico Municipal') }}</label>
                <input type="text" name="nombre_periodico" class="form-control @error('nombre_periodico') is-invalid @enderror" value="{{ old('cantidad_minima', $emisora?->nombre_periodico) }}" id="nombre_periodico" placeholder="Nombre Periodico Municipal">
                {!! $errors->first('nombre_periodico', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group mb-2 mb20">
                <label for="nombre_canal_television" class="form-label">{{ __('Nombre Canal Television Municipal') }}</label>
                <input type="text" name="nombre_canal_television" class="form-control @error('nombre_canal_television') is-invalid @enderror" value="{{ old('nombre_canal_television', $emisora?->nombre_canal_television) }}" id="nombre_canal_television" placeholder="Nombre Canal Television">
                {!! $errors->first('nombre_canal_television', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
        </div>

        
        


       </div>
        
        <br>
        <br>
        <h3>
            Contactos
        </h3>
        <br>

        <div class="row">
        
            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="facebook" class="form-label">{{ __('Facebook') }}</label>
                    <input type="text" name="facebook" class="form-control @error('facebook') is-invalid @enderror" value="{{ old('facebook', $emisora?->facebook) }}" id="facebook" placeholder="Facebook">
                    {!! $errors->first('facebook', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="instagram" class="form-label">{{ __('Instagram') }}</label>
                    <input type="text" name="instagram" class="form-control @error('instagram') is-invalid @enderror" value="{{ old('instagram', $emisora?->instagram) }}" id="instagram" placeholder="Instagram">
                    {!! $errors->first('instagram', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="tiktok" class="form-label">{{ __('Tiktok') }}</label>
                    <input type="text" name="tiktok" class="form-control @error('tiktok') is-invalid @enderror" value="{{ old('tiktok', $emisora?->tiktok) }}" id="tiktok" placeholder="Tiktok">
                    {!! $errors->first('tiktok', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="email" class="form-label">{{ __('Email') }}</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $emisora?->email) }}" id="email" placeholder="Email">
                    {!! $errors->first('email', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="email2" class="form-label">{{ __('Email 2') }}</label>
                    <input type="email" name="email2" class="form-control @error('email2') is-invalid @enderror" value="{{ old('email2', $emisora?->email2) }}" id="email2" placeholder="Email 2">
                    {!! $errors->first('email2', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="email3" class="form-label">{{ __('Email 3') }}</label>
                    <input type="email" name="email3" class="form-control @error('email3') is-invalid @enderror" value="{{ old('email3', $emisora?->email3) }}" id="email3" placeholder="Email">
                    {!! $errors->first('email3', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="telefono1" class="form-label">{{ __('Telefono') }}</label>
                    <input type="tel" name="telefono1" class="form-control @error('telefono1') is-invalid @enderror" value="{{ old('telefono1', $emisora?->telefono1) }}" id="telefono1" placeholder="Telefono">
                    {!! $errors->first('telefono1', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="celular" class="form-label">{{ __('Celular') }}</label>
                    <input type="tel" name="celular" class="form-control @error('celular') is-invalid @enderror" value="{{ old('celular', $emisora?->celular) }}" id="celular" placeholder="Celular">
                    {!! $errors->first('celular', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
        </div>

        <br>
        <br>

        <div class="row">
            <div class="col-md-3">
                <div class="form-group mb-2 mb20">
                    <label for="gerente" class="form-label">{{ __('Gerente') }}</label>
                    <input type="text" name="gerente" class="form-control @error('gerente') is-invalid @enderror" value="{{ old('gerente', $emisora?->gerente) }}" id="gerente" placeholder="Gerente">
                    {!! $errors->first('gerente', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-2 mb20">
                    <label for="telefono_gerente" class="form-label">{{ __('Telefono del Gerente') }}</label>
                    <input type="tel" name="telefono_gerente" class="form-control @error('telefono_gerente') is-invalid @enderror" value="{{ old('telefono_gerente', $emisora?->telefono_gerente) }}" id="telefono_gerente" placeholder="Telefono del Gerente">
                    {!! $errors->first('telefono_gerente', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-2 mb20">
                    <label for="director_noticias" class="form-label">{{ __('Director Noticias') }}</label>
                    <input type="text" name="director_noticias" class="form-control @error('director_noticias') is-invalid @enderror" value="{{ old('director_noticias', $emisora?->director_noticias) }}" id="director_noticias" placeholder="Director Noticias">
                    {!! $errors->first('director_noticias', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-2 mb20">
                    <label for="telefono_director_noticias" class="form-label">{{ __('Telefono del Director Noticias') }}</label>
                    <input type="tel" name="telefono_director_noticias" class="form-control @error('telefono_director_noticias') is-invalid @enderror" value="{{ old('telefono_director_noticias', $emisora?->telefono_director_noticias) }}" id="telefono_director_noticias" placeholder="Telefono del Director Noticias">
                    {!! $errors->first('telefono_director_noticias', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
           
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group mb-2 mb20">
                    <label for="encargado_pauta" class="form-label">{{ __('Encargado de Pauta') }}</label>
                    <input type="text" name="encargado_pauta" class="form-control @error('encargado_pauta') is-invalid @enderror" value="{{ old('encargado_pauta', $emisora?->encargado_pauta) }}" id="encargado_pauta" placeholder="Encargado de pauta">
                    {!! $errors->first('encargado_pauta', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-2 mb20">
                    <label for="telefono_encargado_pauta" class="form-label">{{ __('Telefono del Encargado de Pauta') }}</label>
                    <input type="tel" name="telefono_encargado_pauta" class="form-control @error('telefono_encargado_pauta') is-invalid @enderror" value="{{ old('telefono_encargado_pauta', $emisora?->telefono_encargado_pauta) }}" id="telefono_encargado_pauta" placeholder="Telefono del Encargado de Pauta">
                    {!! $errors->first('telefono_encargado_pauta', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-2 mb20">
                    <label for="representante_legal" class="form-label">{{ __('Representante Legal') }}</label>
                    <input type="text" name="representante_legal" class="form-control @error('representante_legal') is-invalid @enderror" value="{{ old('representante_legal', $emisora?->representante_legal) }}" id="representante_legal" placeholder="Representante Legal">
                    {!! $errors->first('representante_legal', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-2 mb20">
                    <label for="telefono_representante_legal" class="form-label">{{ __('Telefono del Representante Legal') }}</label>
                    <input type="tel" name="telefono_representante_legal" class="form-control @error('telefono_representante_legal') is-invalid @enderror" value="{{ old('telefono_representante_legal', $emisora?->telefono_representante_legal) }}" id="telefono_representante_legal" placeholder="Telefono del Representante Legal">
                    {!! $errors->first('telefono_representante_legal', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
        </div>

        <br>
        <br>
        <h3>
            Observaciones
        </h3>
        <br>

        <div class="row">
        
            <div class="col-md-12">
                <div class="form-group mb-2 mb20">
                    <label for="observaciones" class="form-label">{{ __('Observaciones') }}</label>
                    <textarea name="observaciones" id="observaciones" cols="20" rows="4" class="form-control @error('observaciones') is-invalid @enderror" placeholder="Observaciones">{{ old('observaciones', $emisora?->observaciones) }}</textarea>
                    {!! $errors->first('observaciones', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>

    

        
        

        </div>
        <div class="col-md-12 mt20 mt-2">
            <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
        </div>
</div>