<div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group mb-2 mb20">
                <label for="estado_id" class="form-label"><?php echo e(__('Departamento')); ?></label>
                <select class="form-control" id="estado" wire:model.live="estadoSeleccionado" >
                    <option value="">Seleccione un Departamento</option>
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $estados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($estado->id); ?>"><?php echo e($estado->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                </select>
                <?php echo $errors->first('estado_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

            </div>
        </div>
        

        <div class="col-md-6">
            <div class="form-group mb-2 mb20">
                <label for="municipio_id" class="form-label"><?php echo e(__('Municipio')); ?></label>
                <select class="form-control"  name="municipio_id" id="municipio_id" wire:model="municipioSeleccionado" wire:disabled="!$estadoSeleccionado" required>
                    <option value="">Seleccione un municipio</option>
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $municipios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $municipio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($municipio->id); ?>"><?php echo e($municipio->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                </select>
                <?php echo $errors->first('municipio_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>'); ?>

            </div>
        </div>
    </div>

</div><?php /**PATH C:\xampp\htdocs\cradial\resources\views/livewire/selectores.blade.php ENDPATH**/ ?>