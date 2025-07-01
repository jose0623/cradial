<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <strong>¡Ups! Hubo algunos problemas con tu envío.</strong>
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>

<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        
        <div class="row">

            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="cliente_id" class="form-label"><?php echo e(__('Cliente')); ?></label>
                    <select required name="cliente_id" id="cliente_id"  class="form-control " >
                        <option value="">Seleccione...</option>
        
                        <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           
                        <option 
                        <?php if( $item->id == $reporte->cliente_id ): ?>
                        selected="selected"
                        <?php endif; ?>
                           
                            
                            value="<?php echo e($item->id); ?>"><?php echo e($item->nombre); ?></option>
        
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
                    </select>
                    
                    <?php echo $errors->first('cliente_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="titulo" class="form-label"><?php echo e(__('Referencia')); ?></label>
                    <input type="text" name="titulo" class="form-control <?php $__errorArgs = ['titulo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('titulo', $reporte?->titulo)); ?>" id="titulo" placeholder="Referencia">
                    <?php echo $errors->first('titulo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="codigo_propuesta" class="form-label"><?php echo e(__('Codigo Propuesta')); ?></label>
                    <input type="text" readonly  name="codigo_propuesta" class="form-control <?php $__errorArgs = ['codigo_propuesta'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('codigo_propuesta', $reporte?->id.'-'.$reporte?->codigo_propuesta)); ?>" id="codigo_propuesta" placeholder="000-0">
                    <?php echo $errors->first('codigo_propuesta', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

                </div>
            </div>
        </div>

        <br>
        <div class="row">


            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="estado" class="form-label"><?php echo e(__('Estado')); ?></label>
                    <select required name="estado" id="estado"  class="form-control " >
                        <option value="">Seleccione...</option>

                        
                            <option 
                                <?php if( $reporte->estado == "borrador" ): ?>
                                selected="selected"
                                <?php endif; ?>
                            value="borrador">Borrador</option>

                            <option 
                                <?php if( $reporte->estado == "enviado" ): ?>
                                selected="selected"
                                <?php endif; ?>
                                value="enviado">Enviado</option>

                            <option 
                                <?php if( $reporte->estado == "aprobado" ): ?>
                                selected="selected"
                                <?php endif; ?>
                                value="aprobado">Aprobado</option>

                            <option 
                                <?php if( $reporte->estado == "rechazado" ): ?>
                                selected="selected"
                                <?php endif; ?>
                                value="rechazado">Rechazado</option>

                       
                    </select>






                    <?php echo $errors->first('estado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

                </div>

            </div>
            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="es_propuesta" class="form-label"><?php echo e(__('Producto del cliente relacionado')); ?></label>
                    <input type="text" name="es_propuesta" class="form-control <?php $__errorArgs = ['es_propuesta'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('es_propuesta', $reporte?->es_propuesta)); ?>" id="es_propuesta" placeholder="Producto del cliente relacionado">
                    <?php echo $errors->first('es_propuesta', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group mb-2 mb20">
                    <label for="vigencia_desde" class="form-label"><?php echo e(__('Vigencia Desde')); ?></label>
                    <input type="date" name="vigencia_desde" class="form-control <?php $__errorArgs = ['vigencia_desde'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('vigencia_desde', $reporte?->vigencia_desde)); ?>" id="vigencia_desde" placeholder="Vigencia Desde">
                    <?php echo $errors->first('vigencia_desde', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group mb-2 mb20">
                    <label for="vigencia_hasta" class="form-label"><?php echo e(__('Vigencia Hasta')); ?></label>
                    <input type="date" name="vigencia_hasta" class="form-control <?php $__errorArgs = ['vigencia_hasta'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('vigencia_hasta', $reporte?->vigencia_hasta)); ?>" id="vigencia_hasta" placeholder="Vigencia Hasta">
                    <?php echo $errors->first('vigencia_hasta', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

                </div>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group mb-2 mb20">
                    <label for="observaciones" class="form-label"><?php echo e(__('Observaciones')); ?></label>
                    <textarea name="observaciones" class="form-control <?php $__errorArgs = ['observaciones'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  id="observaciones" placeholder="Observaciones"><?php echo e(old('observaciones', $reporte?->observaciones)); ?></textarea>
                    <?php echo $errors->first('observaciones', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

                </div>
            </div>
        </div>
        <br>
        
        <div class="row">

            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="subtotal" class="form-label"><?php echo e(__('Subtotal')); ?></label>
                    <input type="text" readonly name="subtotal" class="form-control <?php $__errorArgs = ['subtotal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('subtotal', $reporte?->subtotal)); ?>" id="subtotal" placeholder="0.00">
                    <?php echo $errors->first('subtotal', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="iva" class="form-label"><?php echo e(__('Iva')); ?></label>
                    <input type="text" readonly name="iva" class="form-control <?php $__errorArgs = ['iva'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('iva', $reporte?->iva)); ?>" id="iva" placeholder="0.00">
                    <?php echo $errors->first('iva', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mb-2 mb20">
                    <label for="total" class="form-label"><?php echo e(__('Total')); ?></label>
                    <input type="text" readonly name="total" class="form-control <?php $__errorArgs = ['total'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('total', $reporte?->total)); ?>" id="total" placeholder="0.00">
                    <?php echo $errors->first('total', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

                </div>
            </div>
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary"><?php echo e(__('Submit')); ?></button>
    </div>
</div><?php /**PATH C:\xampp\htdocs\cradial\resources\views/reporte/form.blade.php ENDPATH**/ ?>