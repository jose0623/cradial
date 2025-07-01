<?php $__env->startSection('template_title'); ?>
    Reporte Items
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <br>
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div>
                                <h4><strong>Reporte de Trazabilidad</strong></h4>
                                <?php
                                    $reporte = $reporteItems->first() ? $reporteItems->first()->reporte : null;
                                ?>
                                <?php if($reporte): ?>
                                    <b>Reporte N: </b> <?php echo e($reporte->id); ?>-<?php echo e($reporte->codigo_propuesta); ?> <br>
                                <?php else: ?>
                                    <b>Reporte N: </b> N/A <br>
                                <?php endif; ?>
                                <b>Vigencia: </b> <?php echo e($vigencia_desde); ?> - <?php echo e($vigencia_hasta); ?>

                                <br>
                                <b>Total Items: </b> <?php echo e($reporteItems->count()); ?>

                            </div>
                            <div class="float-right">
                                <a href="<?php echo e(route('reportes.reporte-items.create', ['id_reporte' => $id_reporte])); ?>" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    <i class="fa fa-plus"></i> <?php echo e(__('Crear Nuevo')); ?>

                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <!-- Estadísticas Generales -->
                        <div class="row mb-4">
                            <div class="col-md-3">
                                <div class="card bg-primary text-white">
                                    <div class="card-body text-center">
                                        <h5>Precio Base</h5>
                                        <h3><?php echo e($reporteItems->where('precio_base', '!=', null)->count()); ?></h3>
                                        <small>Items registrados</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card bg-success text-white">
                                    <div class="card-body text-center">
                                        <h5>Precio Venta</h5>
                                        <h3><?php echo e($reporteItems->where('precio_venta', '!=', null)->count()); ?></h3>
                                        <small>Items registrados</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card bg-info text-white">
                                    <div class="card-body text-center">
                                        <h5>Con IVA</h5>
                                        <h3><?php echo e($reporteItems->where('valor_iva', '>', 0)->count()); ?></h3>
                                        <small>Items con IVA</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card bg-warning text-white">
                                    <div class="card-body text-center">
                                        <h5>Recargos</h5>
                                        <h3><?php echo e($reporteItems->filter(function($item) { return $item->recargo_noticiero == 1 || $item->recargo_mencion == 1; })->count()); ?></h3>
                                        <small>Items con recargos</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tabla Detallada de Trazabilidad + Acciones -->
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Item</th>
                                        <th>Emisora</th>
                                        <th>Programa</th>
                                        <th>Precio Base</th>
                                        <th>Precio Venta</th>
                                        <th>Factor Duración</th>
                                        <th>Recargos</th>
                                        <th>IVA (%)</th>
                                        <th>Valor IVA</th>
                                        <th>Total con IVA</th>
                                        <th>Usuario</th>
                                        <th>Fecha</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $reporteItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e($item->emisora->name ?? 'N/A'); ?></td>
                                            <td><?php echo e($item->programa->nombre_programa ?? 'N/A'); ?></td>
                                            <td><?php echo e($item->precio_base ? number_format($item->precio_base, 2) : 'N/A'); ?></td>
                                            <td><?php echo e($item->precio_venta ? number_format($item->precio_venta, 2) : 'N/A'); ?></td>
                                            <td><?php echo e($item->factor_duracion ?? 'N/A'); ?></td>
                                            <td>
                                                <?php if($item->recargo_noticiero): ?>
                                                    <span class="badge bg-danger">Noticiero</span>
                                                <?php endif; ?>
                                                <?php if($item->recargo_mencion): ?>
                                                    <span class="badge bg-warning">Mención</span>
                                                <?php endif; ?>
                                                <?php if(!$item->recargo_noticiero && !$item->recargo_mencion): ?>
                                                    <span class="badge bg-secondary">Sin recargo</span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($item->iva_aplicado ? $item->iva_aplicado . '%' : 'N/A'); ?></td>
                                            <td><?php echo e($item->valor_iva ? number_format($item->valor_iva, 2) : 'N/A'); ?></td>
                                            <td><?php echo e($item->valor_total_con_iva ? number_format($item->valor_total_con_iva, 2) : 'N/A'); ?></td>
                                            <td><?php echo e($item->usuario_creador_id ?? 'N/A'); ?></td>
                                            <td><?php echo e($item->created_at ? $item->created_at->format('d/m/Y H:i') : 'N/A'); ?></td>
                                            <td>
                                                <form action="<?php echo e(route('reporte-items.destroy', $item->id)); ?>" method="POST" style="display:inline-block;">
                                                    <a class="btn btn-sm btn-primary" href="<?php echo e(route('reporte-items.show', $item->id)); ?>"><i class="fa fa-fw fa-eye"></i></a>
                                                    <a class="btn btn-sm btn-success" href="<?php echo e(route('reporte-items.edit', $item->id)); ?>"><i class="fa fa-fw fa-edit"></i></a>
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); if(confirm('¿Estás seguro de eliminar?')) this.closest('form').submit();"><i class="fa fa-fw fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                        <?php echo $reporteItems->withQueryString()->links(); ?>


                        <!-- Resumen de Factores -->
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h6><strong>Factores de Duración Utilizados</strong></h6>
                                    </div>
                                    <div class="card-body">
                                        <?php
                                            $factores = $reporteItems->where('factor_duracion', '!=', null)->groupBy('factor_duracion');
                                        ?>
                                        <?php $__currentLoopData = $factores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $factor => $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="d-flex justify-content-between">
                                                <span><?php echo e($factor); ?></span>
                                                <span class="badge bg-primary"><?php echo e($items->count()); ?> items</span>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h6><strong>Tipos de Recargo</strong></h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <span>Noticiero</span>
                                            <span class="badge bg-danger"><?php echo e($reporteItems->where('recargo_noticiero', 1)->count()); ?> items</span>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <span>Mención</span>
                                            <span class="badge bg-warning"><?php echo e($reporteItems->where('recargo_mencion', 1)->count()); ?> items</span>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <span>Sin recargo</span>
                                            <span class="badge bg-secondary"><?php echo e($reporteItems->where('recargo_noticiero', 0)->where('recargo_mencion', 0)->count()); ?> items</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cradial\resources\views/reporte-item/index.blade.php ENDPATH**/ ?>