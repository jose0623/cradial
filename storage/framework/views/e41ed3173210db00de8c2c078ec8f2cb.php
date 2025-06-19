<?php $__env->startSection('template_title'); ?>
    Reportes
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                <?php echo e(__('Reportes')); ?>

                            </span>
                            <div class="float-right">
                                <a href="<?php echo e(route('reportes.create')); ?>" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Cliente</th>
                                        <th>Referencia</th>
                                        <th>Estado</th>
                                        <th>Producto del cliente R</th>
                                        <th>Vigencia Desde</th>
                                        <th>Vigencia Hasta</th>
                                        <th>Total</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $reportes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reporte): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($reporte->id); ?>-<?php echo e($reporte->codigo_propuesta); ?></td>
                                            <td><?php echo e($reporte->cliente->nombre); ?></td>
                                            <td><?php echo e($reporte->titulo); ?></td>
                                            <td><?php echo e($reporte->estado); ?></td>
                                            <td><?php echo e($reporte->es_propuesta); ?></td>
                                            <td><?php echo e($reporte->vigencia_desde); ?></td>
                                            <td><?php echo e($reporte->vigencia_hasta); ?></td>
                                            <td><?php echo e($reporte->total); ?></td>
                                            <td class="" style="text-align: right;">
                                                <a class="btn btn-sm btn-info " href="<?php echo e(route('reportes.reporte-items.index', $reporte->id)); ?>"><i class="fa fa-play"></i>  Cargar</a>
                                            </td>
                                            <td>
                                                <form action="<?php echo e(route('reportes.destroy', $reporte->id)); ?>" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="<?php echo e(route('reportes.show', $reporte->id)); ?>"><i class="fa fa-fw fa-eye"></i> <?php echo e(__('Ver')); ?></a>
                                                    <a class="btn btn-sm btn-success" href="<?php echo e(route('reportes.edit', $reporte->id)); ?>"><i class="fa fa-fw fa-edit"></i> <?php echo e(__('Editar')); ?></a>
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('¿Estás seguro de eliminar?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> <?php echo e(__('Eliminar')); ?></button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php echo $reportes->withQueryString()->links(); ?> 
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cradial\resources\views/reporte/index.blade.php ENDPATH**/ ?>