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

                            <div class="" style="text-align: left">

                                <b>Reporte N: </b> <?php echo e($id_reporte); ?> 
                                <br>
                                <b> Vigencia desde: </b> <span style="color: red"> <?php echo e($vigencia_desde); ?> </span> 
                                --
                                <b> hasta: </b> <span style="color: red"> <?php echo e($vigencia_hasta); ?> </span>
                                
                                <br>
                                <b> SubTotal : </b> <span style="color: red"> <?php echo e($subtotal); ?> </span>
                                --
                                <b> Total : </b> <span style="color: red"> <?php echo e($total); ?> </span>
                                
                            </div>

                             <div class="float-right">
                                <a href="<?php echo e(route('reportes.reporte-items.create', ['id_reporte' => $id_reporte])); ?>" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  <?php echo e(__('Crear Nuevo')); ?>

                                </a>
                                <a href="<?php echo e(route('reportes.reporte-items.trazabilidad', ['id_reporte' => $id_reporte])); ?>" class="btn btn-info btn-sm float-right ml-2"  data-placement="left">
                                  <i class="fa fa-chart-bar"></i> <?php echo e(__('Trazabilidad')); ?>

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
                                    <th>No</th>
									<th >Emisora</th>
									<th >Programa</th>
									<th >Tipo</th>
									<th >Duracion</th>
									<th >Dias Emision</th>
									<th >Horario</th>
									<th >Cant Dias</th>
									<th >Cuña x Dia</th>
									<th >Precio Base</th>
									<th >Precio Venta</th>
									<th >Bonif</th>
									<th >Descuento</th>
									<th >Valor Total</th>
									<th >IVA</th>
									<th >Total con IVA</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $reporteItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reporteItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e(++$i); ?></td>
                                            
										<td ><?php echo e($reporteItem->emisora->name); ?></td>
										<td ><?php echo e($reporteItem->programa->nombre_programa); ?></td>
                                        <td>
                                            <?php echo e($reporteItem->tipo_cuna == 1 ? 'Cuña' : ($reporteItem->tipo_cuna == 2 ? 'Mención' : $reporteItem->tipo_cuna)); ?>

                                        </td>
                                        <td>
                                            <?php if($reporteItem->duracion == '30%' ): ?>
                                                5s
                                            <?php elseif($reporteItem->duracion == '50%' ): ?>
                                                10s
                                            <?php elseif($reporteItem->duracion == '60%' ): ?>
                                                15s
                                            <?php elseif($reporteItem->duracion == '75%' ): ?>
                                                20s
                                            <?php elseif($reporteItem->duracion == '85%' ): ?>
                                                25s
                                            <?php elseif($reporteItem->duracion == '100%' ): ?>
                                                30s
                                            <?php elseif($reporteItem->duracion == '120%' ): ?>
                                                35s
                                            <?php elseif($reporteItem->duracion == '133%' ): ?>
                                                40s
                                            <?php elseif($reporteItem->duracion == '150%' ): ?>
                                                45s
                                            <?php elseif($reporteItem->duracion == '170%' ): ?>
                                                50s
                                            <?php elseif($reporteItem->duracion == '185%' ): ?>
                                                55s
                                            <?php elseif($reporteItem->duracion == '200%' ): ?>
                                                1min
                                            <?php else: ?>
                                            <?php echo e($reporteItem->duracion); ?> 
                                            <?php endif; ?>
                                        </td>

										<td > <small>
                                            <?php echo e($reporteItem->programa->lunes == 1 ? 'LU' : ''); ?>

                                            <?php echo e($reporteItem->programa->martes == 1 ? 'MA' : ''); ?>

                                            <?php echo e($reporteItem->programa->miercoles == 1 ? 'MI' : ''); ?>

                                            <?php echo e($reporteItem->programa->jueves == 1 ? 'JU' : ''); ?>

                                            <?php echo e($reporteItem->programa->viernes == 1 ? 'VI' : ''); ?>

                                            <?php echo e($reporteItem->programa->sabado == 1 ? 'SA' : ''); ?>

                                            <?php echo e($reporteItem->programa->domingo == 1 ? 'DO' : ''); ?>

                                        </small>
                                        </td>
										<td ><?php echo e($reporteItem->horario); ?></td>
										<td ><?php echo e($reporteItem->cantidad_dias); ?></td>
										<td ><?php echo e($reporteItem->cunas_por_dia); ?></td>
										<td ><?php echo e($reporteItem->precio_base); ?></td>
										<td ><?php echo e($reporteItem->precio_venta); ?></td>
										<td ><?php echo e($reporteItem->bonificacion); ?></td>
										<td ><?php echo e($reporteItem->descuento); ?></td>
										<td ><?php echo e($reporteItem->valor_neto); ?></td>
										<td ><?php echo e($reporteItem->valor_iva); ?></td>
										<td ><?php echo e($reporteItem->valor_total_con_iva); ?></td>

                                            <td>
                                                <form action="<?php echo e(route('reporte-items.destroy', $reporteItem->id)); ?>" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="<?php echo e(route('reporte-items.show', $reporteItem->id)); ?>"><i class="fa fa-fw fa-eye"></i> <?php echo e(__('Ver')); ?></a>
                                                    <a class="btn btn-sm btn-success" href="<?php echo e(route('reporte-items.edit', $reporteItem->id)); ?>"><i class="fa fa-fw fa-edit"></i> <?php echo e(__('Editar')); ?></a>
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
                <?php echo $reporteItems->withQueryString()->links(); ?>

                
                <!-- Resumen de Trazabilidad -->
                <div class="card mt-4">
                    <div class="card-header">
                        <h5><strong>Resumen de Trazabilidad</strong></h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="text-center">
                                    <h6>Items con Precio Base</h6>
                                    <span class="badge bg-primary"><?php echo e($reporteItems->where('precio_base', '!=', null)->count()); ?></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="text-center">
                                    <h6>Items con Precio Venta</h6>
                                    <span class="badge bg-success"><?php echo e($reporteItems->where('precio_venta', '!=', null)->count()); ?></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="text-center">
                                    <h6>Items con IVA</h6>
                                    <span class="badge bg-info"><?php echo e($reporteItems->where('valor_iva', '>', 0)->count()); ?></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="text-center">
                                    <h6>Items con Recargos</h6>
                                    <span class="badge bg-warning"><?php echo e($reporteItems->filter(function($item) { return $item->recargo_noticiero == 1 || $item->recargo_mencion == 1; })->count()); ?></span>
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