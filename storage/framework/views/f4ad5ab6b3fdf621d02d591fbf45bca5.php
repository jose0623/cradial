<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="row">
            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="name" class="form-label"><?php echo e(__('Nombre')); ?></label>
                    <input type="text" name="name" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('name', $emisora?->name)); ?>" id="name" placeholder="Name" required>
                    <?php echo $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="potencia" class="form-label"><?php echo e(__('Potencia')); ?></label>
                    <input type="text" name="potencia" class="form-control <?php $__errorArgs = ['potencia'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('potencia', $emisora?->potencia)); ?>" id="potencia" placeholder="Potencia" required>
                    <?php echo $errors->first('potencia', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="dial" class="form-label"><?php echo e(__('Dial')); ?></label>
                    <input type="text" name="dial" class="form-control <?php $__errorArgs = ['dial'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('dial', $emisora?->dial)); ?>" id="dial" placeholder="Dial" required>
                    <?php echo $errors->first('dial', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="tipo_emisoras_id" class="form-label"><?php echo e(__('Tipo Emisoras')); ?></label>
                    
                    <select required name="tipo_emisoras_id" id="tipo_emisoras_id"  class="form-control " >
                        <option value="">Seleccione...</option>
        
                        <?php $__currentLoopData = $tipoEmisora; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           
                        <option 
                        value="<?php echo e($item->id); ?>" <?php echo e(old('tipo_emisoras_id', $emisora?->tipo_emisoras_id) == $item->id ? 'selected' : ''); ?>><?php echo e($item->name); ?></option>
        
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
                    </select>
                    
                    <?php echo $errors->first('tipo_emisoras_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="tipo_documento" class="form-label"><?php echo e(__('Tipo Documento')); ?></label>
        
                    <select name="tipo_documento" id="tipo_documento" class="form-control" required>


                        <option value="">Seleccione... </option>
                        <option value="1" <?php echo e(old('tipo_documento', $emisora?->tipo_documento) == 1 ? 'selected' : ''); ?>>NIT</option>
                        <option value="2" <?php echo e(old('tipo_documento', $emisora?->tipo_documento) == 2 ? 'selected' : ''); ?>>C.C</option>
                        <option value="3" <?php echo e(old('tipo_documento', $emisora?->tipo_documento) == 3 ? 'selected' : ''); ?>>C.E.</option>
                        <option value="4" <?php echo e(old('tipo_documento', $emisora?->tipo_documento) == 4 ? 'selected' : ''); ?>>T.I.</option>
                        <option value="5" <?php echo e(old('tipo_documento', $emisora?->tipo_documento) == 5 ? 'selected' : ''); ?>>OTRO</option>
                    
                    
                    </select>
                    <?php echo $errors->first('tipo_documento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="identificacion" class="form-label"><?php echo e(__('Identificacion')); ?></label>
                    <input type="text" name="identificacion" class="form-control <?php $__errorArgs = ['identificacion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('identificacion', $emisora?->identificacion)); ?>" id="identificacion" placeholder="Identificacion" required>
                    <?php echo $errors->first('identificacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

                </div>
            </div>
            

                        
        </div>
        <div class="row">
            
            <div class="col-md-8">
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('selectores', ['municipioId' => $emisora->municipio_id, 'required' => true]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3430458981-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
            </div>

            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="direccion" class="form-label"><?php echo e(__('Direccion')); ?></label>
                    <input type="text" name="direccion" class="form-control <?php $__errorArgs = ['direccion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('direccion', $emisora?->direccion)); ?>" id="direccion" placeholder="Direccion" required>
                    <?php echo $errors->first('direccion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

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
                        <label for="tiene_real_audio" class="form-label"><?php echo e(__('Tiene Real Audio')); ?></label>
                        <select name="tiene_real_audio" id="tiene_real_audio" class="form-control">
                            <option value="">Seleccione... </option>
                            <option value="1" <?php echo e(old('tiene_real_audio', $emisora?->tiene_real_audio) == 1 ? 'selected' : ''); ?> >Si</option>
                            <option value="0" <?php echo e(old('tiene_real_audio', $emisora?->tiene_real_audio) == 0 ? 'selected' : ''); ?> >No</option>
                        </select>
                        <?php echo $errors->first('tiene_real_audio', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group mb-2 mb20">
                        <label for="real_audio" class="form-label"><?php echo e(__('Real Audio')); ?></label>
                        <input type="text" name="real_audio" class="form-control <?php $__errorArgs = ['real_audio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('real_audio', $emisora?->real_audio)); ?>" id="real_audio" placeholder="Real Audio">
                        <?php echo $errors->first('real_audio', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group mb-2 mb20">
                        <label for="descripcion_real_audio" class="form-label"><?php echo e(__('Descripcion del Real Audio')); ?></label>
                        <input type="text" name="descripcion_real_audio" class="form-control <?php $__errorArgs = ['descripcion_real_audio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('descripcion_real_audio', $emisora?->descripcion_real_audio)); ?>" id="descripcion_real_audio" placeholder="Descripcion Real Audio">
                        <?php echo $errors->first('descripcion_real_audio', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

                    </div>
                </div>
            
        </div>
       <div class="row">
            <div class="col-md-3">
                <div class="form-group mb-2 mb20">
                    <label for="utiliza_remoto" class="form-label"><?php echo e(__('Utiliza Remoto?')); ?></label>
                    
                    <select name="utiliza_remoto" id="utiliza_remoto" class="form-control">
                        <option value="">Seleccione... </option>
                        <option value="1" <?php echo e(old('utiliza_remoto', $emisora?->utiliza_remoto) == 1 ? 'selected' : ''); ?> >Si</option>
                        <option value="0" <?php echo e(old('utiliza_remoto', $emisora?->utiliza_remoto) == 0 ? 'selected' : ''); ?> >No</option>
                    </select>
                    <?php echo $errors->first('utiliza_remoto', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-2 mb20">
                    <label for="tarifa_remoto" class="form-label"><?php echo e(__('Tarifa Remoto')); ?></label>
                    <input type="text" name="tarifa_remoto" class="moneda form-control <?php $__errorArgs = ['tarifa_remoto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('tarifa_remoto', $emisora?->tarifa_remoto)); ?>" id="tarifa_remoto" placeholder="Tarifa Remoto">
                    <?php echo $errors->first('tarifa_remoto', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-2 mb20">
                    <label for="Tiempo_remoto" class="form-label"><?php echo e(__('Tiempo del Remoto')); ?></label>
                    <input type="text" name="tiempo_remoto" class="form-control <?php $__errorArgs = ['tiempo_remoto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('tiempo_remoto', $emisora?->tiempo_remoto)); ?>" id="tiempo_remoto" placeholder="Tiempo remoto">
                    <?php echo $errors->first('tiempo_remoto', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-2 mb20">
                    <label for="descripcion_remoto" class="form-label"><?php echo e(__('Descripcion del Remoto')); ?></label>
                    <input type="text" name="descripcion_remoto" class="form-control <?php $__errorArgs = ['descripcion_remoto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('descripcion_remoto', $emisora?->descripcion_remoto)); ?>" id="Descripcion remoto" placeholder="Descripcion remoto">
                    <?php echo $errors->first('descripcion_remoto', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-md-3">
                <div class="form-group mb-2 mb20">
                    <label for="utiliza_perifoneo" class="form-label"><?php echo e(__('Utiliza Perifoneo')); ?></label>
                    <select name="utiliza_perifoneo" id="utiliza_perifoneo" class="form-control">
                        <option value="">Seleccione... </option>
                        <option value="1" <?php echo e(old('utiliza_perifoneo', $emisora?->utiliza_perifoneo) == 1 ? 'selected' : ''); ?>>Si</option>
                        <option value="0" <?php echo e(old('utiliza_perifoneo', $emisora?->utiliza_perifoneo) == 0 ? 'selected' : ''); ?>>No</option>
                    </select>
                    <?php echo $errors->first('utiliza_perifoneo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-2 mb20">
                    <label for="tarifa_perifoneo" class="form-label"><?php echo e(__('Tarifa Perifoneo')); ?></label>
                    <input type="text" name="tarifa_perifoneo" class=" moneda form-control <?php $__errorArgs = ['tarifa_perifoneo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('tarifa_perifoneo', $emisora?->tarifa_perifoneo)); ?>" id="tarifa_perifoneo" placeholder="Tarifa Perifoneo">
                    <?php echo $errors->first('tarifa_perifoneo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-2 mb20">
                    <label for="Tiempo_perifoneo" class="form-label"><?php echo e(__('Tiempo del Perifoneo')); ?></label>
                    <input type="text" name="tiempo_perifoneo" class="form-control <?php $__errorArgs = ['tiempo_perifoneo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('tiempo_perifoneo', $emisora?->tiempo_perifoneo)); ?>" id="tiempo_perifoneo" placeholder="Tiempo perifoneo">
                    <?php echo $errors->first('tiempo_perifoneo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-2 mb20">
                    <label for="descripcion_perifoneo" class="form-label"><?php echo e(__('Descripcion del Perifoneo')); ?></label>
                    <input type="text" name="descripcion_perifoneo" class="form-control <?php $__errorArgs = ['descripcion_perifoneo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('descripcion_perifoneo', $emisora?->descripcion_perifoneo)); ?>" id="descripcion_perifoneo" placeholder="Descripcion perifoneo">
                    <?php echo $errors->first('descripcion_perifoneo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

                </div>
            </div>

        </div>
        

        
       <div class="row">
            <div class="col-md-3">
                <div class="form-group mb-2 mb20">
                    <label for="web" class="form-label"><?php echo e(__('Web')); ?></label>
                    <input type="text" name="web" class="form-control <?php $__errorArgs = ['web'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('web', $emisora?->web)); ?>" id="web" placeholder="Web">
                    <?php echo $errors->first('web', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-2 mb20">
                    <label for="clase_pauta" class="form-label"><?php echo e(__('Pauta que no puede emitir la emisora?')); ?></label>
                    <input type="text" name="clase_pauta" class="form-control <?php $__errorArgs = ['clase_pauta'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('clase_pauta', $emisora?->clase_pauta)); ?>" id="clase_pauta" placeholder="Clase Pauta">
                    <?php echo $errors->first('clase_pauta', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-2 mb20">
                    <label for="licencia_funcionamiento" class="form-label"><?php echo e(__('Licencia Funcionamiento')); ?></label>
                    <input type="text" name="licencia_funcionamiento" class="form-control <?php $__errorArgs = ['licencia_funcionamiento'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('licencia_funcionamiento', $emisora?->licencia_funcionamiento)); ?>" id="licencia_funcionamiento" placeholder="Licencia Funcionamiento">
                    <?php echo $errors->first('licencia_funcionamiento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

                </div>
            </div>

        <div class="col-md-3">
            <div class="form-group mb-2 mb20">
                <label for="afiliacion_id" class="form-label"><?php echo e(__('Afiliacion')); ?></label>
                
                <select required name="afiliacion_id" id="afiliacion_id"  class="form-control " >
                    <option value="">Seleccione...</option>
    
                    <?php $__currentLoopData = $tipoAfiliacione; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       
                    <option 
                    value="<?php echo e($item->id); ?>" <?php echo e(old('afiliacion_id', $emisora?->afiliacion_id) == $item->id ? 'selected' : ''); ?>><?php echo e($item->name); ?></option>
    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
                </select>
                <?php echo $errors->first('afiliacion_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

            </div>
        </div>

       </div>

       <div class="row">
        <div class="col-md-3">
            <div class="form-group mb-2 mb20">
                <label for="cantidad_minima" class="form-label"><?php echo e(__('Cantidad Minima (Cuñas o valor)')); ?></label>
                <input type="text" name="cantidad_minima" class="form-control <?php $__errorArgs = ['cantidad_minima'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('cantidad_minima', $emisora?->cantidad_minima)); ?>" id="cantidad_minima" placeholder="Cantidad minima Cuñas">
                <?php echo $errors->first('cantidad_minima', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group mb-2 mb20">
                <label for="iva" class="form-label"><?php echo e(__('Iva')); ?></label>
                <select name="iva" id="iva" class="form-control" required>
                    <option value="">Seleccione... </option>
                    <option value="1" <?php echo e(old('iva', $emisora?->iva) == 1 ? 'selected' : ''); ?> >Si</option>
                    <option value="0" <?php echo e(old('iva', $emisora?->iva) == 0 ? 'selected' : ''); ?> >No</option>
                </select>
                <?php echo $errors->first('iva', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group mb-2 mb20">
                <label for="nombre_periodico" class="form-label"><?php echo e(__('Nombre Periodico Municipal')); ?></label>
                <input type="text" name="nombre_periodico" class="form-control <?php $__errorArgs = ['nombre_periodico'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('cantidad_minima', $emisora?->nombre_periodico)); ?>" id="nombre_periodico" placeholder="Nombre Periodico Municipal">
                <?php echo $errors->first('nombre_periodico', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group mb-2 mb20">
                <label for="nombre_canal_television" class="form-label"><?php echo e(__('Nombre Canal Television Municipal')); ?></label>
                <input type="text" name="nombre_canal_television" class="form-control <?php $__errorArgs = ['nombre_canal_television'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('nombre_canal_television', $emisora?->nombre_canal_television)); ?>" id="nombre_canal_television" placeholder="Nombre Canal Television">
                <?php echo $errors->first('nombre_canal_television', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

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
                    <label for="facebook" class="form-label"><?php echo e(__('Facebook')); ?></label>
                    <input type="text" name="facebook" class="form-control <?php $__errorArgs = ['facebook'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('facebook', $emisora?->facebook)); ?>" id="facebook" placeholder="Facebook">
                    <?php echo $errors->first('facebook', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="instagram" class="form-label"><?php echo e(__('Instagram')); ?></label>
                    <input type="text" name="instagram" class="form-control <?php $__errorArgs = ['instagram'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('instagram', $emisora?->instagram)); ?>" id="instagram" placeholder="Instagram">
                    <?php echo $errors->first('instagram', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="tiktok" class="form-label"><?php echo e(__('Tiktok')); ?></label>
                    <input type="text" name="tiktok" class="form-control <?php $__errorArgs = ['tiktok'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('tiktok', $emisora?->tiktok)); ?>" id="tiktok" placeholder="Tiktok">
                    <?php echo $errors->first('tiktok', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="email" class="form-label"><?php echo e(__('Email')); ?></label>
                    <input type="email" name="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('email', $emisora?->email)); ?>" id="email" placeholder="Email" required>
                    <?php echo $errors->first('email', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="email2" class="form-label"><?php echo e(__('Email 2')); ?></label>
                    <input type="email" name="email2" class="form-control <?php $__errorArgs = ['email2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('email2', $emisora?->email2)); ?>" id="email2" placeholder="Email 2">
                    <?php echo $errors->first('email2', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="email3" class="form-label"><?php echo e(__('Email 3')); ?></label>
                    <input type="email" name="email3" class="form-control <?php $__errorArgs = ['email3'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('email3', $emisora?->email3)); ?>" id="email3" placeholder="Email">
                    <?php echo $errors->first('email3', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="telefono1" class="form-label"><?php echo e(__('Telefono')); ?></label>
                    <input type="tel" name="telefono1" class="form-control <?php $__errorArgs = ['telefono1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('telefono1', $emisora?->telefono1)); ?>" id="telefono1" placeholder="Teléfono" required>
                    <?php echo $errors->first('telefono1', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="celular" class="form-label"><?php echo e(__('Celular')); ?></label>
                    <input type="tel" name="celular" class="form-control <?php $__errorArgs = ['celular'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('celular', $emisora?->celular)); ?>" id="celular" placeholder="Celular" required>
                    <?php echo $errors->first('celular', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

                </div>
            </div>
        </div>

        <br>
        <br>

        <div class="row">
            <div class="col-md-3">
                <div class="form-group mb-2 mb20">
                    <label for="gerente" class="form-label"><?php echo e(__('Gerente')); ?></label>
                    <input type="text" name="gerente" class="form-control <?php $__errorArgs = ['gerente'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('gerente', $emisora?->gerente)); ?>" id="gerente" placeholder="Gerente" required>
                    <?php echo $errors->first('gerente', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-2 mb20">
                    <label for="telefono_gerente" class="form-label"><?php echo e(__('Telefono del Gerente')); ?></label>
                    <input type="tel" name="telefono_gerente" class="form-control <?php $__errorArgs = ['telefono_gerente'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('telefono_gerente', $emisora?->telefono_gerente)); ?>" id="telefono_gerente" placeholder="Teléfono del Gerente" required>
                    <?php echo $errors->first('telefono_gerente', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-2 mb20">
                    <label for="director_noticias" class="form-label"><?php echo e(__('Director Noticias')); ?></label>
                    <input type="text" name="director_noticias" class="form-control <?php $__errorArgs = ['director_noticias'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('director_noticias', $emisora?->director_noticias)); ?>" id="director_noticias" placeholder="Director Noticias" required>
                    <?php echo $errors->first('director_noticias', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-2 mb20">
                    <label for="telefono_director_noticias" class="form-label"><?php echo e(__('Telefono del Director Noticias')); ?></label>
                    <input type="tel" name="telefono_director_noticias" class="form-control <?php $__errorArgs = ['telefono_director_noticias'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('telefono_director_noticias', $emisora?->telefono_director_noticias)); ?>" id="telefono_director_noticias" placeholder="Teléfono del Director Noticias" required>
                    <?php echo $errors->first('telefono_director_noticias', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

                </div>
            </div>
           
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group mb-2 mb20">
                    <label for="encargado_pauta" class="form-label"><?php echo e(__('Encargado de Pauta')); ?></label>
                    <input type="text" name="encargado_pauta" class="form-control <?php $__errorArgs = ['encargado_pauta'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('encargado_pauta', $emisora?->encargado_pauta)); ?>" id="encargado_pauta" placeholder="Encargado de Pauta" required>
                    <?php echo $errors->first('encargado_pauta', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-2 mb20">
                    <label for="telefono_encargado_pauta" class="form-label"><?php echo e(__('Telefono del Encargado de Pauta')); ?></label>
                    <input type="tel" name="telefono_encargado_pauta" class="form-control <?php $__errorArgs = ['telefono_encargado_pauta'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('telefono_encargado_pauta', $emisora?->telefono_encargado_pauta)); ?>" id="telefono_encargado_pauta" placeholder="Teléfono del Encargado de Pauta" required>
                    <?php echo $errors->first('telefono_encargado_pauta', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-2 mb20">
                    <label for="representante_legal" class="form-label"><?php echo e(__('Representante Legal')); ?></label>
                    <input type="text" name="representante_legal" class="form-control <?php $__errorArgs = ['representante_legal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('representante_legal', $emisora?->representante_legal)); ?>" id="representante_legal" placeholder="Representante Legal">
                    <?php echo $errors->first('representante_legal', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-2 mb20">
                    <label for="telefono_representante_legal" class="form-label"><?php echo e(__('Telefono del Representante Legal')); ?></label>
                    <input type="tel" name="telefono_representante_legal" class="form-control <?php $__errorArgs = ['telefono_representante_legal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('telefono_representante_legal', $emisora?->telefono_representante_legal)); ?>" id="telefono_representante_legal" placeholder="Telefono del Representante Legal">
                    <?php echo $errors->first('telefono_representante_legal', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-2 mb20">
                    <label for="emisora_activa" class="form-label"><?php echo e(__('Emisora Activa')); ?></label>
                    <select name="emisora_activa" id="emisora_activa" class="form-control <?php $__errorArgs = ['emisora_activa'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                        <option value="">Seleccione...</option>
                        <option value="1" <?php echo e(old('emisora_activa', $emisora?->emisora_activa) === 1 ? 'selected' : ''); ?>>Sí</option>
                        <option value="0" <?php echo e(old('emisora_activa', $emisora?->emisora_activa) === 0 ? 'selected' : ''); ?>>No</option>
                    </select>
                    <?php echo $errors->first('emisora_activa', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-2 mb20">
                    <label for="observacion_estado_emisora" class="form-label"><?php echo e(__('Observación del Estado de la Emisora')); ?></label>
                    <textarea name="observacion_estado_emisora" id="observacion_estado_emisora" cols="30" rows="3" class="form-control <?php $__errorArgs = ['observacion_estado_emisora'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Motivo del estado de la emisora"><?php echo e(old('observacion_estado_emisora', $emisora?->observacion_estado_emisora)); ?></textarea>
                    <?php echo $errors->first('observacion_estado_emisora', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

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
                    <label for="observaciones" class="form-label"><?php echo e(__('Observaciones')); ?></label>
                    <textarea name="observaciones" id="observaciones" cols="20" rows="4" class="form-control <?php $__errorArgs = ['observaciones'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Observaciones"><?php echo e(old('observaciones', $emisora?->observaciones)); ?></textarea>
                    <?php echo $errors->first('observaciones', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

                </div>
            </div>

    

        
        

        </div>
        <div class="col-md-12 mt20 mt-2">
            <button type="submit" class="btn btn-primary"><?php echo e(__('Guardar')); ?></button>
        </div>
</div><?php /**PATH C:\xampp\htdocs\cradial\resources\views/emisora/form.blade.php ENDPATH**/ ?>