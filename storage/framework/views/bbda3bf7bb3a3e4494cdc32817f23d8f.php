<?php $__env->startSection('template_title'); ?>
    Tipo Emisoras
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<style>
    form {
        width: max-content;
        margin: 0 0 0 auto;
    }
</style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <br>
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                <?php echo e(__('Tipo Emisoras')); ?>

                            </span>
                            <div class="float-right">
                                <a href="<?php echo e(route('tipo-emisoras.create')); ?>" class="btn btnbr btn-primary btn-sm float-right"  data-placement="left">
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
[$__name, $__params] = $__split('tipo-emisora-search');

$__html = app('livewire')->mount($__name, $__params, 'lw-1674444396-0', $__slots ?? [], get_defined_vars());

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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cradial\resources\views/tipo-emisora/index.blade.php ENDPATH**/ ?>