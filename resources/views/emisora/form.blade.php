<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="row">
            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="name" class="form-label">{{ __('Name') }}</label>
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
            <div class="col-md-8">
                @livewire('selectores', ['municipioId' => $emisora->municipio_id])
            </div>
            
            
        </div>
        
        <br>
        <br>
        <h3>
            Ubicación y Cobertura
        </h3>
        <br>
        <div class="row">
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
            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="telefono1" class="form-label">{{ __('Telefono1') }}</label>
                    <input type="tel" name="telefono1" class="form-control @error('telefono1') is-invalid @enderror" value="{{ old('telefono1', $emisora?->telefono1) }}" id="telefono1" placeholder="Telefono1">
                    {!! $errors->first('telefono1', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="telefono2" class="form-label">{{ __('Telefono2') }}</label>
                    <input type="tel" name="telefono2" class="form-control @error('telefono2') is-invalid @enderror" value="{{ old('telefono2', $emisora?->telefono2) }}" id="telefono2" placeholder="Telefono2">
                    {!! $errors->first('telefono2', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="celular" class="form-label">{{ __('Celular') }}</label>
                    <input type="tel" name="celular" class="form-control @error('celular') is-invalid @enderror" value="{{ old('celular', $emisora?->celular) }}" id="celular" placeholder="Celular">
                    {!! $errors->first('celular', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="email" class="form-label">{{ __('Email') }}</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $emisora?->email) }}" id="email" placeholder="Email">
                    {!! $errors->first('email', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="facebook" class="form-label">{{ __('Facebook') }}</label>
                    <input type="tel" name="facebook" class="form-control @error('facebook') is-invalid @enderror" value="{{ old('facebook', $emisora?->facebook) }}" id="facebook" placeholder="Facebook">
                    {!! $errors->first('facebook', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="instagram" class="form-label">{{ __('Instagram') }}</label>
                    <input type="tel" name="instagram" class="form-control @error('instagram') is-invalid @enderror" value="{{ old('instagram', $emisora?->instagram) }}" id="instagram" placeholder="Instagram">
                    {!! $errors->first('instagram', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="tiktok" class="form-label">{{ __('Tiktok') }}</label>
                    <input type="tiktok" name="tiktok" class="form-control @error('tiktok') is-invalid @enderror" value="{{ old('tiktok', $emisora?->tiktok) }}" id="tiktok" placeholder="Tiktok">
                    {!! $errors->first('tiktok', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
        </div>
        
       <div class="row">
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
            <div class="col-md-4">
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
            <div class="col-md-4">
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
            <div class="col-md-4">
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
       </div>
        
       <div class="row">
            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="web" class="form-label">{{ __('Web') }}</label>
                    <input type="text" name="web" class="form-control @error('web') is-invalid @enderror" value="{{ old('web', $emisora?->web) }}" id="web" placeholder="Web">
                    {!! $errors->first('web', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="clase_pauta" class="form-label">{{ __('Clase de Pauta que no puede Emitir la Emisora?') }}</label>
                    <input type="text" name="clase_pauta" class="form-control @error('clase_pauta') is-invalid @enderror" value="{{ old('clase_pauta', $emisora?->clase_pauta) }}" id="clase_pauta" placeholder="Clase Pauta">
                    {!! $errors->first('clase_pauta', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="licencia_funcionamiento" class="form-label">{{ __('Licencia Funcionamiento') }}</label>
                    <input type="text" name="licencia_funcionamiento" class="form-control @error('licencia_funcionamiento') is-invalid @enderror" value="{{ old('licencia_funcionamiento', $emisora?->licencia_funcionamiento) }}" id="licencia_funcionamiento" placeholder="Licencia Funcionamiento">
                    {!! $errors->first('licencia_funcionamiento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
            
       </div>

       <div class="row">

        <div class="col-md-4">
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

        <div class="col-md-4">
            <div class="form-group mb-2 mb20">
                <label for="valor_costo" class="form-label">{{ __('Valor costo pauta por 30 seg') }}</label>
                <input type="text" name="valor_costo" class="form-control @error('valor_costo') is-invalid @enderror" value="{{ old('valor_costo', $emisora?->valor_costo) }}" id="valor_costo" placeholder="Valor Pauta">
                {!! $errors->first('valor_costo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
        </div>

       
       </div>
        
        
       
        
        
        
        

        <br><br>
        <h3>Manejo comercial
        </h3>
        <br>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="cantidad_maxima_cuñas" class="form-label">{{ __('Cantidad Maxima Cuñas') }}</label>
                    <input type="text" name="cantidad_maxima_cuñas" class="form-control @error('cantidad_maxima_cuñas') is-invalid @enderror" value="{{ old('cantidad_maxima_cuñas', $emisora?->cantidad_maxima_cuñas) }}" id="cantidad_maxima_cuñas" placeholder="Cantidad Maxima Cuñas">
                    {!! $errors->first('cantidad_maxima_cuñas', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="tarifa_remoto" class="form-label">{{ __('Tarifa Remoto') }}</label>
                    <input type="text" name="tarifa_remoto" class="form-control @error('tarifa_remoto') is-invalid @enderror" value="{{ old('tarifa_remoto', $emisora?->tarifa_remoto) }}" id="tarifa_remoto" placeholder="Tarifa Remoto">
                    {!! $errors->first('tarifa_remoto', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="porcentaje_descuento" class="form-label">{{ __('Porcentaje Descuento') }}</label>
                    <input type="text" name="porcentaje_descuento" class="form-control @error('porcentaje_descuento') is-invalid @enderror" value="{{ old('porcentaje_descuento', $emisora?->porcentaje_descuento) }}" id="porcentaje_descuento" placeholder="Porcentaje Descuento">
                    {!! $errors->first('porcentaje_descuento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="tarifa_perifoneo" class="form-label">{{ __('Tarifa Perifoneo') }}</label>
                    <input type="text" name="tarifa_perifoneo" class="form-control @error('tarifa_perifoneo') is-invalid @enderror" value="{{ old('tarifa_perifoneo', $emisora?->tarifa_perifoneo) }}" id="tarifa_perifoneo" placeholder="Tarifa Perifoneo">
                    {!! $errors->first('tarifa_perifoneo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
            <div class="col-md-4">
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
            <div class="col-md-4">
                
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
                    <label for="gerente" class="form-label">{{ __('Gerente') }}</label>
                    <input type="text" name="gerente" class="form-control @error('gerente') is-invalid @enderror" value="{{ old('gerente', $emisora?->gerente) }}" id="gerente" placeholder="Gerente">
                    {!! $errors->first('gerente', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="director_noticias" class="form-label">{{ __('Director Noticias') }}</label>
                    <input type="text" name="director_noticias" class="form-control @error('director_noticias') is-invalid @enderror" value="{{ old('director_noticias', $emisora?->director_noticias) }}" id="director_noticias" placeholder="Director Noticias">
                    {!! $errors->first('director_noticias', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="nombre_mejor_locutor" class="form-label">{{ __('Nombre Mejor Locutor') }}</label>
                    <input type="text" name="nombre_mejor_locutor" class="form-control @error('nombre_mejor_locutor') is-invalid @enderror" value="{{ old('nombre_mejor_locutor', $emisora?->nombre_mejor_locutor) }}" id="nombre_mejor_locutor" placeholder="Nombre Mejor Locutor">
                    {!! $errors->first('nombre_mejor_locutor', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="operador_telefonia" class="form-label">{{ __('Operador Telefonia') }}</label>
                    <input type="text" name="operador_telefonia" class="form-control @error('operador_telefonia') is-invalid @enderror" value="{{ old('operador_telefonia', $emisora?->operador_telefonia) }}" id="operador_telefonia" placeholder="Operador Telefonia">
                    {!! $errors->first('operador_telefonia', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="lider_opinion" class="form-label">{{ __('Lider Opinion') }}</label>
                    <input type="text" name="lider_opinion" class="form-control @error('lider_opinion') is-invalid @enderror" value="{{ old('lider_opinion', $emisora?->lider_opinion) }}" id="lider_opinion" placeholder="Lider Opinion">
                    {!! $errors->first('lider_opinion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
        </div>

        
        
       
       
        

        <br>
        <br>
        <h3>
            Cuenta de usuario
        </h3>
        <br>

        <div class="row">
            <div class="col-md-3">
                <div class="form-group mb-2 mb20">
                    <label for="login" class="form-label">{{ __('Login') }}</label>
                    <input type="text" name="login" class="form-control @error('login') is-invalid @enderror" value="{{ old('login', $emisora?->login) }}" id="login" placeholder="Login">
                    {!! $errors->first('login', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-2 mb20">
                    <label for="password" class="form-label">{{ __('password') }}</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password', $emisora?->password) }}" id="password" placeholder="password">
                    {!! $errors->first('password', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-2 mb20">
                    <label for="estado" class="form-label">{{ __('Estado') }}</label>
                    
                    <select name="estado" id="estado" class="form-control">
                        <option value="">Seleccione... </option>
                        <option value="1" {{ $emisora->estado == 1 ? 'selected="selected"' : '' }} >Si</option>
                        <option value="0" {{ $emisora->estado == 0 ? 'selected="selected"' : '' }}>No</option>
                    </select>
                    {!! $errors->first('estado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-2 mb20">
                    <label for="plataforma" class="form-label">{{ __('Id Plataforma') }}</label>
                    <input type="number" name="plataforma" class="form-control @error('plataforma') is-invalid @enderror" value="{{ old('plataforma', $emisora?->plataforma) }}" id="plataforma" placeholder="Plataforma">
                    {!! $errors->first('plataforma', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
        </div>

        
        <br>

                    <input type="hidden" name="nombre_programa" class="form-control @error('nombre_programa') is-invalid @enderror" value="0" id="nombre_programa" placeholder="Nombre Programa">
                    <input type="hidden" name="horario" class="form-control @error('horario') is-invalid @enderror" value="0" id="horario" placeholder="Horario">
                    <input type="hidden" name="rating" class="form-control @error('rating') is-invalid @enderror" value="0" id="rating" placeholder="Rating">
                    <input type="hidden" name="programa_mayor_audiencia" class="form-control @error('programa_mayor_audiencia') is-invalid @enderror" value="0" id="programa_mayor_audiencia" placeholder="Programa Mayor Audiencia">
                    <input type="hidden" name="nombre_periodico" class="form-control @error('nombre_periodico') is-invalid @enderror" value="0" id="nombre_periodico" placeholder="Nombre Periodico">
                    <input type="hidden" name="nombre_canal_television" class="form-control @error('nombre_canal_television') is-invalid @enderror" value="0" id="nombre_canal_television" placeholder="Nombre Canal Television">
                    <input type="hidden" name="tipo_programa_id" class="form-control @error('tipo_programa_id') is-invalid @enderror" value="1" id="tipo_programa_id" placeholder="tipo_programa_id">

        
        

        </div>
        <div class="col-md-12 mt20 mt-2">
            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
        </div>
</div>