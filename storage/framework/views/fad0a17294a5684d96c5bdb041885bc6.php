<?php $__env->startSection('template_title'); ?>
    Emisora Programas
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            
                                <span id="card_title">
                                    <?php echo e(__('Emisora:')); ?>  <b> <?php echo e($emisora->name); ?> </b>
                                </span>
                           

                             <div class="float-right">
                                <a href="<?php echo e(route('emisoras.index')); ?>" class="btn btnbr btn-secondary btn-sm float-right me-2">
                                    <?php echo e(__('Regresar a Emisoras')); ?>

                                </a>    
                                <a href="<?php echo e(route('emisora.programas.create', ['id_emisora' => $id_emisora])); ?>" class="btn btnbr btn-primary btn-sm float-right"  data-placement="left">
                                  <?php echo e(__('Crear Nuevo')); ?>

                                </a>
                              </div>
                        </div>
                    </div>
                    <?php if($message = Session::get('success')): ?>
                        <div class="alert alert-success m-4">
                            <p><?php echo e($message); ?></p>
                        </div>
                    <?php endif; ?>

                    
                    <div class="card-body bg-white">
                        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('emisora-programa-search', ['id_emisora' => $id_emisora]);

$__html = app('livewire')->mount($__name, $__params, 'lw-2685690135-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cradial\resources\views/emisora-programa/index.blade.php ENDPATH**/ ?>