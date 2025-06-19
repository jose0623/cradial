<?php $__env->startSection('template_title'); ?>
    <?php echo e($emisora->name ?? __('Ver') . ' ' . __('Emisora')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <br>
                <div class="card">
                    <div class="card-header justify-content-between align-items-center">
                        <span class="card-title"><?php echo e(__('Ver')); ?> Emisora</span>
                        <div class="float-right">
                            <div class="btn-group">
                                <div class="d-flex justify-content-between mb-3">
                                    <a class="btn btnbr btn-primary btn-sm" href="<?php echo e(route('emisoras.index')); ?>"> <?php echo e(__('Regresar')); ?></a>
                                    &nbsp;
                                    <a href="<?php echo e(route('emisoras.reporte.excel', $emisora->id)); ?>" target="_blank" rel="noopener noreferrer">
                                        <button class="btn btn-success btn-sm">
                                            <i class="fa fa-file-excel"></i> Excel
                                        </button>
                                    </a>
                                    &nbsp;
                                    <a href="<?php echo e(route('emisoras.reporte.pdf', $emisora->id)); ?>" target="_blank" rel="noopener noreferrer">
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-file-pdf"></i> PDF
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                            

                    <div class="card-body bg-white">
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <strong>Nombre:</strong>
                                <div><?php echo e($emisora->name); ?></div>
                            </div>
                            <div class="col-md-3">
                                <strong>Potencia:</strong>
                                <div><?php echo e($emisora->potencia); ?></div>
                            </div>
                            <div class="col-md-3">
                                <strong>Dial:</strong>
                                <div><?php echo e($emisora->dial); ?></div>
                            </div>
                            <div class="col-md-3">
                                <strong>Tipo Emisora:</strong>
                                <div><?php echo e($emisora->tipoEmisora->name); ?></div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <strong>Tipo Documento:</strong>
                                <div>
                                    <?php if($emisora->tipo_documento == 1): ?> NIT <?php endif; ?>
                                    <?php if($emisora->tipo_documento == 2): ?> C.C <?php endif; ?>
                                    <?php if($emisora->tipo_documento == 3): ?> C.E. <?php endif; ?>
                                    <?php if($emisora->tipo_documento == 4): ?> T.I. <?php endif; ?>
                                    <?php if($emisora->tipo_documento == 5): ?> OTRO <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <strong>Identificacion:</strong>
                                <div><?php echo e($emisora->identificacion); ?></div>
                            </div>
                            <div class="col-md-3">
                                <strong>Municipio:</strong>
                                <div><?php echo e($emisora->municipio->name); ?></div>
                            </div>
                            <div class="col-md-3">
                                <strong>Direccion:</strong>
                                <div><?php echo e($emisora->direccion); ?></div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <h4><b> Caracteristicas </b></h4>
                        <br>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <strong>Tiene Real Audio:</strong>
                                <div><?php echo e($emisora->tiene_real_audio == 1 ? 'Si' : 'No'); ?></div>
                            </div>
                            <div class="col-md-3">
                                <strong>Real Audio:</strong>
                                <div><?php echo e($emisora->real_audio); ?></div>
                            </div>
                            <div class="col-md-6">
                                <strong>Descripcion del Real Audio:</strong>
                                <div><?php echo e($emisora->descripcion_real_audio); ?></div>
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <strong>Utiliza Remoto:</strong>
                                <div><?php echo e($emisora->utiliza_remoto == 1 ? 'Si' : 'No'); ?></div>
                            </div>
                            <div class="col-md-3">
                                <strong>Tarifa Remoto:</strong>
                                <div><?php echo e($emisora->tarifa_remoto); ?></div>
                            </div>
                            <div class="col-md-3">
                                <strong>Tiempo del Remoto:</strong>
                                <div><?php echo e($emisora->tiempo_remoto); ?></div>
                            </div>
                            <div class="col-md-3">
                                <strong>Descripcion del Remoto:</strong>
                                <div><?php echo e($emisora->descripcion_remoto); ?></div>
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <strong>Utiliza Perifoneo:</strong>
                                <div><?php echo e($emisora->utiliza_perifoneo == 1 ? 'Si' : 'No'); ?></div>
                            </div>
                            <div class="col-md-3">
                                <strong>Tarifa Perifoneo:</strong>
                                <div><?php echo e($emisora->tarifa_perifoneo); ?></div>
                            </div>
                            <div class="col-md-3">
                                <strong>Tiempo del Perifoneo:</strong>
                                <div><?php echo e($emisora->tiempo_perifoneo); ?></div>
                            </div>
                            <div class="col-md-3">
                                <strong>Descripcion del Perifoneo:</strong>
                                <div><?php echo e($emisora->descripcion_perifoneo); ?></div>
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <strong>Web:</strong>
                                <div><?php echo e($emisora->web); ?></div>
                            </div>
                            <div class="col-md-3">
                                <strong>Pauta que no puede emitir la emisora?:</strong>
                                <div><?php echo e($emisora->clase_pauta); ?></div>
                            </div>
                            <div class="col-md-3">
                                <strong>Licencia Funcionamiento:</strong>
                                <div><?php echo e($emisora->licencia_funcionamiento); ?></div>
                            </div>
                            <div class="col-md-3">
                                <strong>Afiliacion:</strong>
                                <div><?php echo e($emisora->tipoAfiliacione->name); ?></div>
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <strong>Cantidad Minima (Cuñas o valor):</strong>
                                <div><?php echo e($emisora->cantidad_minima); ?></div>
                            </div>
                            <div class="col-md-3">
                                <strong>Iva:</strong>
                                <div><?php echo e($emisora->iva == 1 ? 'Si' : 'No'); ?></div>
                            </div>
                            <div class="col-md-3">
                                <strong>Nombre Periodico:</strong>
                                <div><?php echo e($emisora->nombre_periodico); ?></div>
                            </div>
                            <div class="col-md-3">
                                <strong>Nombre Canal Television:</strong>
                                <div><?php echo e($emisora->nombre_canal_television); ?></div>
                            </div>
                        </div>

                        <hr class="my-4">
                        <h4><b> Contactos: </b></h4>
                        <br>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <strong>Facebook:</strong>
                                <div><?php echo e($emisora->facebook); ?></div>
                            </div>
                            <div class="col-md-3">
                                <strong>Instagram:</strong>
                                <div><?php echo e($emisora->instagram); ?></div>
                            </div>
                            <div class="col-md-3">
                                <strong>Tiktok:</strong>
                                <div><?php echo e($emisora->tiktok); ?></div>
                            </div>
                            <div class="col-md-3">
                                <strong>Email:</strong>
                                <div><?php echo e($emisora->email); ?></div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <strong>Email 2:</strong>
                                <div><?php echo e($emisora->email2); ?></div>
                            </div>
                            <div class="col-md-3">
                                <strong>Email 3:</strong>
                                <div><?php echo e($emisora->email3); ?></div>
                            </div>
                            <div class="col-md-3">
                                <strong>Telefono:</strong>
                                <div><?php echo e($emisora->telefono1); ?></div>
                            </div>
                            <div class="col-md-3">
                                <strong>Celular:</strong>
                                <div><?php echo e($emisora->celular); ?></div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="row mb-3">
                            <div class="col-md-3">
                                <strong>Gerente:</strong>
                                <div><?php echo e($emisora->gerente); ?></div>
                            </div>
                            <div class="col-md-3">
                                <strong>Telefono del Gerente:</strong>
                                <div><?php echo e($emisora->telefono_gerente); ?></div>
                            </div>
                            <div class="col-md-3">
                                <strong>Director Noticias:</strong>
                                <div><?php echo e($emisora->director_noticias); ?></div>
                            </div>
                            <div class="col-md-3">
                                <strong>Telefono del Director Noticias:</strong>
                                <div><?php echo e($emisora->telefono_director_noticias); ?></div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <strong>Encargado de Pauta:</strong>
                                <div><?php echo e($emisora->encargado_pauta); ?></div>
                            </div>
                            <div class="col-md-3">
                                <strong>Telefono del Encargado de Pauta:</strong>
                                <div><?php echo e($emisora->telefono_encargado_pauta); ?></div>
                            </div>
                            <div class="col-md-3">
                                <strong>Representante Legal:</strong>
                                <div><?php echo e($emisora->representante_legal); ?></div>
                            </div>
                            <div class="col-md-3">
                                <strong>Telefono del Representante Legal:</strong>
                                <div><?php echo e($emisora->telefono_representante_legal); ?></div>
                            </div>
                        </div>

                        <hr class="my-4">

                        
                        <h4><b>Estado de la Emisora</b></h4>
                        <br>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <strong>Emisora Activa:</strong>
                                <div>
                                    <?php if($emisora->emisora_activa): ?>
                                        <span class="badge bg-success">Sí</span>
                                    <?php else: ?>
                                        <span class="badge bg-danger">No</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-9"> 
                                <strong>Observación del Estado de la Emisora:</strong>
                                <div><?php echo e($emisora->observacion_estado_emisora ?? 'N/A'); ?></div>
                            </div>
                        </div>
                        <hr class="my-4">
                        

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <strong>Observaciones:</strong>
                                <div><?php echo e($emisora->observaciones); ?></div>
                            </div>
                        </div>

                        <br>
                        <hr class="my-4">

                        <div class="row mb-3">

                            <div class="col-md-6">
                            <h4><b>Coberturas</b></h4>
                                <?php if($coberturas->count() > 0): ?>
                                    <ul class="list-group">
                                        <?php $__currentLoopData = $coberturas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cobertura): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="list-group-item">
                                                <strong>Municipio:</strong> <?php echo e($cobertura->municipio->name); ?> |
                                                <strong>Dpto:</strong> <?php echo e($cobertura->municipio->estado->name); ?>

                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                <?php else: ?>
                                    <p>No hay coberturas registradas para esta emisora.</p>
                                <?php endif; ?>
                            </div>
                        
                    
                            <div class="col-md-6">
                                <h4><b>Fiestas</b></h4>
                                <?php if($fiestas->count() > 0): ?>
                                    <ul class="list-group">
                                        <?php $__currentLoopData = $fiestas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fiesta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="list-group-item">
                                                <strong>Nombre:</strong> <?php echo e($fiesta->nombre); ?> |
                                                <strong>Fecha:</strong> <?php echo e($fiesta->fecha); ?>

                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                <?php else: ?>
                                    <p>No hay fiestas registradas para esta emisora.</p>
                                <?php endif; ?>
                            </div>

                        </div>

                        <br>
                        <hr class="my-4">

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <h4><b>Programas</b></h4>
                                <?php if($programas->count() > 0): ?>
                                    <ul class="list-group">
                                        <?php $__currentLoopData = $programas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $programa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="list-group-item">
                                                <strong>Nombre:</strong> <?php echo e($programa->nombre_programa); ?> |
                                                <strong>Locutor:</strong> <?php echo e($programa->nombre_locutor); ?> |
                                                <strong>Tipo:</strong> <?php echo e($programa->tipoPrograma->name); ?> |
                                                <strong>Horario:</strong> <?php echo e($programa->horario); ?> |
                                                <strong>Tarifa:</strong> <?php echo e($programa->costo); ?> | <strong>Venta:</strong> <?php echo e($programa->venta); ?> |
                                                <strong>Dias de transmisión :</strong> 
                                                <small>
                                                    <?php echo e($programa->lunes ? 'LU' : ''); ?>

                                                    <?php echo e($programa->martes ? 'MA' : ''); ?>

                                                    <?php echo e($programa->miercoles ? 'MI' : ''); ?>

                                                    <?php echo e($programa->jueves ? 'JU' : ''); ?>

                                                    <?php echo e($programa->viernes ? 'VI' : ''); ?>

                                                    <?php echo e($programa->sabado ? 'SA' : ''); ?>

                                                    <?php echo e($programa->domingo ? 'DO' : ''); ?>

                                                </small>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                <?php else: ?>
                                    <p>No hay programas registrados para esta emisora.</p>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        

    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cradial\resources\views/emisora/show.blade.php ENDPATH**/ ?>