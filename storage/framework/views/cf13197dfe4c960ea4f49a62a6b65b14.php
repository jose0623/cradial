<?php $__env->startSection('template_title'); ?>
    <?php echo e($reporteItem->name ?? __('Show') . " " . __('Reporte Item')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <br>
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="" style="text-align: left">

                            <?php
                                $reporte = $reporteItem->reporte;
                            ?>
                            <b>Reporte N: </b> <?php echo e($reporte->id); ?>-<?php echo e($reporte->codigo_propuesta); ?> <br>
                            <b> Vigencia desde: </b> <span style="color: red"> <?php echo e($vigencia_desde); ?> </span> -- <b> hasta: </b> <span style="color: red"> <?php echo e($vigencia_hasta); ?> </span><br>
                            
                            <?php
                                $subtotal = $reporte->reporteItems->sum('precio_base');
                            ?>
                            <b> SubTotal : </b> <span style="color: red"> <?php echo e(number_format($subtotal, 2)); ?> </span> -- <b> Total : </b> <span style="color: red"> <?php echo e(number_format($total, 2)); ?> </span>
                            
                        </div>

                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="<?php echo e(route('reporte-items.index')); ?>"> <?php echo e(__('Regresar')); ?></a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                
                                <div class="form-group mb-2 mb20">
                                    <strong>Emisora:</strong>
                                    <?php echo e($reporteItem->emisora->name); ?>

                                </div>
                                
                                <div class="form-group mb-2 mb20">
                                    <strong>Direccion de Emisora:</strong>
                                    <?php echo e($direccionEmisora); ?> <b> Municipio: </b> <?php echo e($municipioEmisora); ?>  <b>Departamento:</b> <?php echo e($estadoEmisora); ?>

                                </div>
                                <strong>Cobertura de la Emisora:</strong>
                                <?php if($municipiosCobertura->isNotEmpty()): ?>
                                    <ul>
                                        <?php $__currentLoopData = $municipiosCobertura->groupBy('estado.name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estado => $municipios): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <strong><?php echo e($estado); ?></strong>
                                                <ul>
                                                    <li>
                                                    
                                                    <?php $__currentLoopData = $municipios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $municipio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php echo e($municipio->name); ?>, 
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </li>
                                                </ul>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                <?php else: ?>
                                    <p>Esta emisora no tiene cobertura registrada en otras regiones.</p>
                                <?php endif; ?>
                        

                                <div class="form-group mb-2 mb20">
                                    <strong>Programa:</strong>
                                    <?php echo e($reporteItem->programa->nombre_programa); ?>

                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Locutor:</strong>
                                    <?php echo e($reporteItem->programa->nombre_locutor); ?>

                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tipo de Pauta:</strong>
                                    <?php echo e($reporteItem->tipo_cuna == 1 ? 'Cuña' : ($reporteItem->tipo_cuna == 2 ? 'Mención' : $reporteItem->tipo_cuna)); ?>

                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Duracion:</strong>
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
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Dias Emision:</strong>
                                    <small>
                                        <?php echo e($reporteItem->programa->lunes == 1 ? 'LU' : ''); ?>

                                        <?php echo e($reporteItem->programa->martes == 1 ? 'MA' : ''); ?>

                                        <?php echo e($reporteItem->programa->miercoles == 1 ? 'MI' : ''); ?>

                                        <?php echo e($reporteItem->programa->jueves == 1 ? 'JU' : ''); ?>

                                        <?php echo e($reporteItem->programa->viernes == 1 ? 'VI' : ''); ?>

                                        <?php echo e($reporteItem->programa->sabado == 1 ? 'SA' : ''); ?>

                                        <?php echo e($reporteItem->programa->domingo == 1 ? 'DO' : ''); ?>

                                    </small>
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Horario:</strong>
                                    <?php echo e($reporteItem->horario); ?>

                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Cantidad Dias:</strong>
                                    <?php echo e($reporteItem->cantidad_dias); ?>

                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Cunas Por Dia:</strong>
                                    <?php echo e($reporteItem->cunas_por_dia); ?>

                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Detalle de cuñas por día:</strong>
                                    <?php
                                        $dias = ['lu' => 'Lu', 'ma' => 'Ma', 'mi' => 'Mi', 'ju' => 'Ju', 'vi' => 'Vi', 'sa' => 'Sa', 'do' => 'Do'];
                                        $detalle = $reporteItem->cunas_por_dia_detalle ? json_decode($reporteItem->cunas_por_dia_detalle, true) : null;
                                    ?>
                                    <?php if($detalle): ?>
                                        <ul class="mb-0">
                                            <?php $__currentLoopData = $dias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(isset($detalle[$key]) && $detalle[$key] !== null): ?>
                                                    <li><b><?php echo e($label); ?>:</b> <?php echo e($detalle[$key]); ?></li>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    <?php else: ?>
                                        <span>No hay detalle registrado.</span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Precio Base:</strong>
                                    <?php echo e($reporteItem->programa->costo); ?> | <?php echo e($reporteItem->programa->venta); ?>

                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Bonificacion:</strong>
                                    <?php echo e($reporteItem->bonificacion); ?>

                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Valor Unitario:</strong>
                                    <?php echo e($reporteItem->valor_unitario); ?>

                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Descuento:</strong>
                                    <?php echo e($reporteItem->descuento); ?>

                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Valor Total:</strong>
                                    <?php echo e($reporteItem->valor_neto); ?>

                                </div>

                                <hr>
                                <h5><strong>Información de Trazabilidad</strong></h5>
                                
                                <div class="form-group mb-2 mb20">
                                    <strong>Precio Base Guardado:</strong>
                                    <?php echo e($reporteItem->precio_base ?? 'No registrado'); ?>

                                </div>
                                
                                <div class="form-group mb-2 mb20">
                                    <strong>Precio de Venta Guardado:</strong>
                                    <?php echo e($reporteItem->precio_venta ?? 'No registrado'); ?>

                                </div>
                                
                                <div class="form-group mb-2 mb20">
                                    <strong>Tipo de Programa ID:</strong>
                                    <?php echo e($reporteItem->tipo_programa_id ?? 'No registrado'); ?>

                                </div>
                                
                                <div class="form-group mb-2 mb20">
                                    <strong>Factor de Duración:</strong>
                                    <?php echo e($reporteItem->factor_duracion ?? 'No registrado'); ?>

                                </div>
                                
                                <div class="form-group mb-2 mb20">
                                    <strong>Recargo Noticiero:</strong>
                                    <?php echo e($reporteItem->recargo_noticiero ? 'Sí' : 'No'); ?>

                                </div>
                                
                                <div class="form-group mb-2 mb20">
                                    <strong>Recargo Mención:</strong>
                                    <?php echo e($reporteItem->recargo_mencion ? 'Sí' : 'No'); ?>

                                </div>
                                
                                <div class="form-group mb-2 mb20">
                                    <strong>IVA Aplicado (%):</strong>
                                    <?php echo e($reporteItem->iva_aplicado ?? 'No registrado'); ?>%
                                </div>
                                
                                <div class="form-group mb-2 mb20">
                                    <strong>Valor IVA:</strong>
                                    <?php echo e($reporteItem->valor_iva ?? 'No registrado'); ?>

                                </div>
                                
                                <div class="form-group mb-2 mb20">
                                    <strong>Valor Total con IVA:</strong>
                                    <?php echo e($reporteItem->valor_total_con_iva ?? 'No registrado'); ?>

                                </div>
                                
                                <div class="form-group mb-2 mb20">
                                    <strong>Usuario Creador:</strong>
                                    <?php echo e($reporteItem->usuario_creador_id ?? 'No registrado'); ?>

                                </div>
                                
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha de Creación:</strong>
                                    <?php echo e($reporteItem->created_at ? $reporteItem->created_at->format('d/m/Y H:i:s') : 'No registrado'); ?>

                                </div>
                                
                                <div class="form-group mb-2 mb20">
                                    <strong>Última Actualización:</strong>
                                    <?php echo e($reporteItem->updated_at ? $reporteItem->updated_at->format('d/m/Y H:i:s') : 'No registrado'); ?>

                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cradial\resources\views/reporte-item/show.blade.php ENDPATH**/ ?>