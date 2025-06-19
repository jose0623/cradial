<?php $__env->startSection('template_title'); ?>
    <?php echo e(__('Create')); ?> Reporte Item
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <br>
                <div class="card card-default">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <b>Reporte N: </b> <?php echo e($id_reporte); ?> 
                               
                            </div>
                            <div class="col-6" style="text-align: right">
                                   <b> Vigencia desde: </b> <span style="color: red"> <?php echo e($vigencia_desde); ?> </span> <b> hasta: </b> <span style="color: red"> <?php echo e($vigencia_hasta); ?> </span>
                                   <input type="date" name="vigencia_desde" wire:model.live="vigencia_desde"  style="display: none" class="form-control <?php $__errorArgs = ['vigencia_desde'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($vigencia_desde); ?>" id="vigencia_desde" placeholder="Reporte Id">
                                   <input type="date" name="vigencia_hasta" wire:model.live="vigencia_hasta"  style="display: none" class="form-control <?php $__errorArgs = ['vigencia_hasta'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($vigencia_hasta); ?>" id="vigencia_hasta" placeholder="Reporte Id">
                            </div>
                        </div>
                
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="<?php echo e(route('reporte-items.store')); ?>"  role="form" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            <input type="hidden" name="reporte_id" class="form-control <?php $__errorArgs = ['reporte_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($id_reporte); ?>" id="reporte_id" placeholder="Reporte Id">
                            
                            <?php echo $__env->make('reporte-item.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cradial\resources\views/reporte-item/create.blade.php ENDPATH**/ ?>