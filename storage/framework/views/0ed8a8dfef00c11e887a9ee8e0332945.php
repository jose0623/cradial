<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="row">
            <div class="col-md-4">
                <input type="hidden" name="id_emisora"  value="<?php echo e($id_emisora); ?>" >
                <div class="form-group mb-2 mb20">
                    <label for="nombre_programa" class="form-label"><?php echo e(__('Nombre Programa')); ?></label>
                    <input type="text" name="nombre_programa" class="form-control <?php $__errorArgs = ['nombre_programa'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('nombre_programa', $emisoraPrograma?->nombre_programa)); ?>" id="nombre_programa" placeholder="Nombre Programa">
                    <?php echo $errors->first('nombre_programa', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="tipo_programa_id" class="form-label"><?php echo e(__('Tipo Programa')); ?></label>
                    
                    

                    <select required name="tipo_programa_id" id="tipo_programa_id"  class="form-control " >
                        <option value="">Seleccione ...</option>
                       
                        <?php $__currentLoopData = $tipoPrograma; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                           <option 
                           <?php if( $item->id == $emisoraPrograma->tipo_programa_id ): ?>
                           selected="selected"
                           <?php endif; ?>
                            value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
                    </select>
                    
                    
                    <?php echo $errors->first('tipo_programa_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="horario" class="form-label"><?php echo e(__('Horario')); ?></label>
                    <input type="text" name="horario" class="form-control <?php $__errorArgs = ['horario'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('horario', $emisoraPrograma?->horario)); ?>" id="horario" placeholder="Horario">
                    <?php echo $errors->first('horario', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="nombre_locutor" class="form-label"><?php echo e(__('Nombre Locutor')); ?></label>
                    <input type="text" name="nombre_locutor" class="form-control <?php $__errorArgs = ['nombre_locutor'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('nombre_locutor', $emisoraPrograma?->nombre_locutor)); ?>" id="nombre_locutor" placeholder="Nombre Locutor">
                    <?php echo $errors->first('nombre_locutor', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

                </div>
            </div>
           
            <div class="col-md-3">
                <div class="form-group mb-2 mb20">
                    <label for="costo" class="form-label"><?php echo e(__('Costo')); ?></label>
                    <input type="number" name="costo" class="form-control <?php $__errorArgs = ['costo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('costo', $emisoraPrograma?->costo)); ?>" id="costo" step="0.01" placeholder="0.00">
                    <?php echo $errors->first('costo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-2 mb20">
                    <label for="venta" class="form-label "><?php echo e(__('Venta')); ?></label>
                    <input type="number" name="venta" class="form-control <?php $__errorArgs = ['venta'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('venta', $emisoraPrograma?->venta)); ?>" id="venta" step="0.01" placeholder="0.00">
                    <?php echo $errors->first('venta', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group mb-2 mb20">
                    <label for="activo" class="form-label"><?php echo e(__('Activo')); ?></label>



                    <select required name="activo" id="activo"  class="form-control " >
                        <option value="">Seleccione ...</option>
        
                       
                           
                           <option 
                           <?php if( $emisoraPrograma->activo == 1 ): ?> selected="selected"
                           <?php endif; ?>
                             value="1">Si</option>
                             <option 
                            <?php if( $emisoraPrograma->activo == 0 ): ?> selected="selected"
                            <?php endif; ?>
                             value="0">no</option>

        
                    </select>
                    

                  
                    <?php echo $errors->first('activo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

                </div>
            </div>

            <div class="col-md-12">

                <div class="form-group mb-2 mb20">
                    <label for="activo" class="form-label"><?php echo e(__('Dias de la Programación')); ?></label>
                </div>



                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="lunes" id="lunes" value="1" 
                    <?php if(old('lunes', $emisoraPrograma->lunes ?? false)): ?> checked <?php endif; ?>>
                    <label class="form-check-label">Lunes</label>
                </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="martes" id="martes" value="1"
                    <?php if(old('lunes', $emisoraPrograma->martes ?? false)): ?> checked <?php endif; ?>>
                    <label class="form-check-label ">Martes</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="miercoles" id="miercoles" value="1"
                    <?php if(old('lunes', $emisoraPrograma->miercoles ?? false)): ?> checked <?php endif; ?>>
                    <label class="form-check-label ">Miercoles</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="jueves" id="jueves" value="1"
                    <?php if(old('lunes', $emisoraPrograma->jueves ?? false)): ?> checked <?php endif; ?>>
                    <label class="form-check-label ">Jueves</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="viernes" id="viernes" value="1"
                    <?php if(old('lunes', $emisoraPrograma->viernes ?? false)): ?> checked <?php endif; ?>>
                    <label class="form-check-label ">Viernes</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="sabado" id="sabado" value="1"
                    <?php if(old('lunes', $emisoraPrograma->sabado ?? false)): ?> checked <?php endif; ?>>
                    <label class="form-check-label ">Sabado</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="domingo" id="domingo" value="1"
                    <?php if(old('lunes', $emisoraPrograma->domingo ?? false)): ?> checked <?php endif; ?>>
                    <label class="form-check-label ">Domingo</label>
                  </div>

            </div>
        </div>


    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary"><?php echo e(__('Guardar')); ?></button>
    </div>
</div><?php /**PATH C:\xampp\htdocs\cradial\resources\views/emisora-programa/form.blade.php ENDPATH**/ ?>