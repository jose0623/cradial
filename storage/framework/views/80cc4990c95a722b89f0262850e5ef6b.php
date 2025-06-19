<?php $__env->startSection('template_title'); ?>
    <?php echo e(__('Update')); ?> Emisora Programa
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">
                <br>
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title"><?php echo e(__('Actualizar')); ?> Programa</span>
                        <div class="float-right">
                            <a class="btn btn-primary btnbr btn-sm" href="<?php echo e(route('emisora.programas.index', ['id_emisora' =>  $emisoraPrograma->id_emisora  ] )); ?>"> <?php echo e(__('Regresar')); ?></a>
                        </div>  
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="<?php echo e(route('emisora-programas.update', $emisoraPrograma->id)); ?>"  role="form" enctype="multipart/form-data">
                            <?php echo e(method_field('PATCH')); ?>

                            <?php echo csrf_field(); ?>

                            <?php echo $__env->make('emisora-programa.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cradial\resources\views/emisora-programa/edit.blade.php ENDPATH**/ ?>