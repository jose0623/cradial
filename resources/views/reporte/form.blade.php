@if ($errors->any())
    <div class="alert alert-danger">
        <strong>¡Ups! Hubo algunos problemas con tu envío.</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        
        <div class="row">

            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="cliente_id" class="form-label">{{ __('Cliente') }}</label>
                    <select required name="cliente_id" id="cliente_id"  class="form-control " >
                        <option value="">Seleccione...</option>
        
                        @foreach ($clientes as $item)
                           
                        <option 
                        @if ( $item->id == $reporte->cliente_id )
                        selected="selected"
                        @endif
                           
                            
                            value="{{ $item->id }}">{{$item->nombre}}</option>
        
                        @endforeach
        
                    </select>
                    
                    {!! $errors->first('cliente_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="titulo" class="form-label">{{ __('Referencia') }}</label>
                    <input type="text" name="titulo" class="form-control @error('titulo') is-invalid @enderror" value="{{ old('titulo', $reporte?->titulo) }}" id="titulo" placeholder="Referencia">
                    {!! $errors->first('titulo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="codigo_propuesta" class="form-label">{{ __('Codigo Propuesta') }}</label>
                    <input type="text" readonly  name="codigo_propuesta" class="form-control @error('codigo_propuesta') is-invalid @enderror" value="{{ old('codigo_propuesta', $reporte?->id.'-'.$reporte?->codigo_propuesta) }}" id="codigo_propuesta" placeholder="000-0">
                    {!! $errors->first('codigo_propuesta', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
        </div>

        <br>
        <div class="row">


            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="estado" class="form-label">{{ __('Estado') }}</label>
                    <select required name="estado" id="estado"  class="form-control " >
                        <option value="">Seleccione...</option>

                        
                            <option 
                                @if ( $reporte->estado == "borrador" )
                                selected="selected"
                                @endif
                            value="borrador">Borrador</option>

                            <option 
                                @if ( $reporte->estado == "enviado" )
                                selected="selected"
                                @endif
                                value="enviado">Enviado</option>

                            <option 
                                @if ( $reporte->estado == "aprobado" )
                                selected="selected"
                                @endif
                                value="aprobado">Aprobado</option>

                            <option 
                                @if ( $reporte->estado == "rechazado" )
                                selected="selected"
                                @endif
                                value="rechazado">Rechazado</option>

                       
                    </select>






                    {!! $errors->first('estado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>

            </div>
            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="es_propuesta" class="form-label">{{ __('Producto del cliente relacionado') }}</label>
                    <input type="text" name="es_propuesta" class="form-control @error('es_propuesta') is-invalid @enderror" value="{{ old('es_propuesta', $reporte?->es_propuesta) }}" id="es_propuesta" placeholder="Producto del cliente relacionado">
                    {!! $errors->first('es_propuesta', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group mb-2 mb20">
                    <label for="vigencia_desde" class="form-label">{{ __('Vigencia Desde') }}</label>
                    <input type="date" name="vigencia_desde" class="form-control @error('vigencia_desde') is-invalid @enderror" value="{{ old('vigencia_desde', $reporte?->vigencia_desde) }}" id="vigencia_desde" placeholder="Vigencia Desde">
                    {!! $errors->first('vigencia_desde', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group mb-2 mb20">
                    <label for="vigencia_hasta" class="form-label">{{ __('Vigencia Hasta') }}</label>
                    <input type="date" name="vigencia_hasta" class="form-control @error('vigencia_hasta') is-invalid @enderror" value="{{ old('vigencia_hasta', $reporte?->vigencia_hasta) }}" id="vigencia_hasta" placeholder="Vigencia Hasta">
                    {!! $errors->first('vigencia_hasta', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group mb-2 mb20">
                    <label for="observaciones" class="form-label">{{ __('Observaciones') }}</label>
                    <textarea name="observaciones" class="form-control @error('observaciones') is-invalid @enderror"  id="observaciones" placeholder="Observaciones">{{ old('observaciones', $reporte?->observaciones) }}</textarea>
                    {!! $errors->first('observaciones', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
        </div>
        <br>
        
        <div class="row">

            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="subtotal" class="form-label">{{ __('Subtotal') }}</label>
                    <input type="text" readonly name="subtotal" class="form-control @error('subtotal') is-invalid @enderror" value="{{ old('subtotal', $reporte?->subtotal) }}" id="subtotal" placeholder="0.00">
                    {!! $errors->first('subtotal', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="iva" class="form-label">{{ __('Iva') }}</label>
                    <input type="text" readonly name="iva" class="form-control @error('iva') is-invalid @enderror" value="{{ old('iva', $reporte?->iva) }}" id="iva" placeholder="0.00">
                    {!! $errors->first('iva', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="total" class="form-label">{{ __('Total') }}</label>
                    <input type="text" readonly name="total" class="form-control @error('total') is-invalid @enderror" value="{{ old('total', $reporte?->total) }}" id="total" placeholder="0.00">
                    {!! $errors->first('total', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>