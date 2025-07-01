<form wire:submit.prevent="guardar">
<div>

    <div class="row">
        <div class="col-md-4">
            <div>

                <input type="hidden" name="id" value="<?php echo e($id); ?>">
                <input type="hidden" name="reporte_id" value="<?php echo e($idreporte); ?>">

                <label for="estado" class="form-label"><?php echo e(__('Estado:')); ?></label>
                <select wire:model.live="estadoSeleccionado" id="estado" name="estado" class="form-control">
                    <option value="">Seleccione un estado</option>
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $estados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($estado->id); ?>"><?php echo e($estado->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div>
                <label for="municipio" class="form-label"><?php echo e(__('Municipio:')); ?></label>
                <select wire:model.live="municipioSeleccionado" id="municipio" name="municipio" class="form-control" <?php if(!$municipios->count()): ?> disabled <?php endif; ?>>
                    <option value="">Seleccione un municipio</option>
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $municipios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $municipio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($municipio->id); ?>"><?php echo e($municipio->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                </select>
                <!--[if BLOCK]><![endif]--><?php if($estadoSeleccionado && !$municipios->count()): ?>
                    <p class="text-red-500">No se encontraron municipios para el estado seleccionado.</p>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>

        <div class="col-md-4">
            <div>
                <label for="tipo_programa" class="form-label"><?php echo e(__('Tipo de Programación:')); ?></label>
                <select wire:model.live="tipoProgramaSeleccionado" id="tipo_programa" name="tipo_programa" class="form-control" <?php if(!$tiposProgramas->count()): ?> disabled <?php endif; ?>>
                    <option value="">Seleccione un tipo de programa</option>
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $tiposProgramas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipoPrograma): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($tipoPrograma->id); ?>"><?php echo e($tipoPrograma->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                </select>
                <!--[if BLOCK]><![endif]--><?php if($municipioSeleccionado && !$tiposProgramas->count()): ?>
                    <p class="text-red-500">No se encontraron tipos de programa para el municipio seleccionado.</p>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>
    </div>

    <br>
    <div class="row">
        <div class="col-md-4">
            <div>
                <label for="id_emisora" class="form-label"><?php echo e(__('Emisora: ')); ?></label>
                <select wire:model="emisoraSeleccionada" id="id_emisora" name="id_emisora" class="form-control">
                    <option value="">Seleccione una emisora</option>
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $emisorasFiltradas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emisora): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($emisora->id); ?>" <?php echo e($emisoraSeleccionada == $emisora->id ? 'selected' : ''); ?>>
                            <?php echo e($emisora->name); ?>

                            <!--[if BLOCK]><![endif]--><?php if($emisora->es_direccion_fisica): ?>
                                (Dirección Física)
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            <!--[if BLOCK]><![endif]--><?php if($emisora->es_por_region): ?>
                                (Por Región)
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </option>
                        
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                </select>
                <!--[if BLOCK]><![endif]--><?php if($tipoProgramaSeleccionado && $municipioSeleccionado && !$emisorasFiltradas->count()): ?>
                    <p class="text-red-500">No se encontraron emisoras con el tipo de programa en el municipio seleccionado.</p>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>

        <div class="col-md-4">
            <div>
                <label for="id_programa" class="form-label"><?php echo e(__('Programa')); ?></label>
                <select wire:model.live="emisoraProgramaSeleccionadoId" id="programa_id" name="programa_id" class="form-control" <?php if(!$emisoraProgramas->count()): ?> disabled <?php endif; ?>>
                    <option value="">Seleccione un programa</option>
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $emisoraProgramas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emisoraPrograma): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($emisoraPrograma->id); ?>">
                            <?php echo e($emisoraPrograma->nombre_programa); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                </select>
                <!--[if BLOCK]><![endif]--><?php if($emisoraSeleccionada && !$emisoraProgramas->count()): ?>
                    <p class="text-red-500">No se encontraron programas para la emisora seleccionada.</p>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>
    

        <!--[if BLOCK]><![endif]--><?php if($programaSeleccionado): ?>
        <div class="col-md-4">
            <div class="form-group mb-2 mb20">
                <label class="form-label"><?php echo e(__('Días de transmisión')); ?></label>
                <input 
                    type="number" 
                    class="form-control" 
                    name="cantidad_dias"
                    value="<?php echo e($cantidad_dias_transmision); ?>" 
                    readonly
                >
                <small class="text-muted">
                   <b> Días activos: </b>
                   <span style="color: red">
                       <!--[if BLOCK]><![endif]--><?php if($programaSeleccionado): ?>
                       <!--[if BLOCK]><![endif]--><?php if($programaSeleccionado->lunes): ?> LU <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                       <!--[if BLOCK]><![endif]--><?php if($programaSeleccionado->martes): ?> MA <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                       <!--[if BLOCK]><![endif]--><?php if($programaSeleccionado->miercoles): ?> MI <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                       <!--[if BLOCK]><![endif]--><?php if($programaSeleccionado->jueves): ?> JU <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                       <!--[if BLOCK]><![endif]--><?php if($programaSeleccionado->viernes): ?> VI <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                       <!--[if BLOCK]><![endif]--><?php if($programaSeleccionado->sabado): ?> SA <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                       <!--[if BLOCK]><![endif]--><?php if($programaSeleccionado->domingo): ?> DO <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                       <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </span>
                </small>
            </div>
        </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>

    <!--[if BLOCK]><![endif]--><?php if($programaSeleccionado): ?>
    <div class="row">
        <div class="col-md-4">
            <div>
                <div class="form-group mb-2 mb20">
                    <label for="Horario" class="form-label"><?php echo e(__('Horario')); ?></label>
                    <input type="text" name="horario" class="form-control" value=" <?php echo e($programaSeleccionado->horario); ?>" readonly >
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div>
                <div class="form-group mb-2 mb20">
                    <label for="locutor" class="form-label"><?php echo e(__('Locutor')); ?></label>
                    <input type="text" name="locutor" class="form-control" value=" <?php echo e($programaSeleccionado->nombre_locutor); ?>" readonly >
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div>
                <div class="form-group mb-2 mb20">
                    <label for="precio" class="form-label"><?php echo e(__('Precio Base')); ?></label>
                    <input type="text" class="form-control" value="<?php echo e($this->formatoMoneda($precio_base)); ?>" readonly>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group mb-2 mb20">
                <label for="tipo_cuna" class="form-label" data-bs-toggle="tooltip" data-bs-placement="top" title="Seleccione el tipo de pauta. La mención tiene un recargo del 30%."><?php echo e(__('Tipo de pauta')); ?></label>
                <select wire:model.live="tipo_cuna" required name="tipo_cuna" id="tipo_cuna" class="form-control">
                    <option value="">Seleccione...</option>
                    <option value="1">Cuña</option>
                    <option value="2">Mención</option>
                </select>
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['tipo_cuna'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group mb-2 mb20">
                <label for="duracion" class="form-label" data-bs-toggle="tooltip" data-bs-placement="top" title="Seleccione la duración de la cuña. El precio se ajusta según el porcentaje."><?php echo e(__('Duración')); ?></label>
                <select wire:model.live="duracion" required name="duracion" id="duracion" class="form-control">
                    <option value="">Seleccione...</option>
                    <option value="30%">5s</option>
                    <option value="50%">10s</option>
                    <option value="60%">15s</option>
                    <option value="75%">20s</option>
                    <option value="85%">25s</option>
                    <option value="100%">30s</option>
                    <option value="120%">35s</option>
                    <option value="133%">40s</option>
                    <option value="150%">45s</option>
                    <option value="170%">50s</option>
                    <option value="185%">55s</option>
                    <option value="200%">1min</option>
                </select>
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['duracion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group mb-2 mb20">
                <label for="bonificacion" class="form-label" data-bs-toggle="tooltip" data-bs-placement="top" title="La bonificación se resta del valor neto. Solo valores positivos."><?php echo e(__('Bonificación')); ?></label>
                <input wire:model.live="bonificacion" type="number" min="0" step="1" name="bonificacion" class="form-control <?php $__errorArgs = ['bonificacion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="bonificacion" placeholder="Bonificación">
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['bonificacion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group mb-2 mb20">
                <label for="descuento" class="form-label" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingrese el porcentaje de descuento (0-100). Solo números enteros."><?php echo e(__('Descuento')); ?></label>
                <div class="input-group">
                    <input wire:model.live="descuento" type="number" min="0" step="1" name="descuento" class="form-control <?php $__errorArgs = ['descuento'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="descuento" placeholder="Descuento">
                    <span class="input-group-text">%</span>
                </div>
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['descuento'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        
        <div class="col-md-4">
            <div class="form-group mb-2 mb20">
                <label for="valor_unitario" class="form-label"><?php echo e(__('Valor Unitario')); ?></label>
                <input readonly type="number" name="valor_unitario" class="form-control <?php $__errorArgs = ['valor_unitario'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($valor_unitario); ?>" id="valor_unitario" placeholder="Valor Unitario">
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['valor_unitario'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group mb-2 mb20">
                <label for="valor_neto" class="form-label"><?php echo e(__('Valor Total')); ?></label>
                <input readonly type="number" name="valor_neto" class="form-control <?php $__errorArgs = ['valor_neto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($valor_neto); ?>" id="valor_neto" placeholder="Valor Neto">
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['valor_neto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-4">
            <div class="form-group mb-2 mb20">
                <label for="precio_venta" class="form-label" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingrese el precio base por cuña. Debe ser un valor positivo."><?php echo e(__('Precio de Venta')); ?></label>
                <input wire:model.live="precio_venta" type="text" class="form-control" id="precio_venta" placeholder="Precio de venta">
                <span class="text-muted small"><?php echo e($this->formatoMoneda($precio_venta)); ?></span>
            </div>
        </div>
        <div class="col-md-8">
            <label class="form-label"><?php echo e(__('Cuñas por día de la semana')); ?></label>
            <div class="row">
                <?php
                    $dias = [
                        'lu' => ['label' => 'Lunes', 'activo' => $programaSeleccionado->lunes ?? false],
                        'ma' => ['label' => 'Martes', 'activo' => $programaSeleccionado->martes ?? false],
                        'mi' => ['label' => 'Miércoles', 'activo' => $programaSeleccionado->miercoles ?? false],
                        'ju' => ['label' => 'Jueves', 'activo' => $programaSeleccionado->jueves ?? false],
                        'vi' => ['label' => 'Viernes', 'activo' => $programaSeleccionado->viernes ?? false],
                        'sa' => ['label' => 'Sábado', 'activo' => $programaSeleccionado->sabado ?? false],
                        'do' => ['label' => 'Domingo', 'activo' => $programaSeleccionado->domingo ?? false],
                    ];
                ?>
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $dias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <!--[if BLOCK]><![endif]--><?php if($info['activo']): ?>
                        <div class="col-md-2 mb-2">
                            <label for="cunas_<?php echo e($key); ?>" class="form-label"><?php echo e($info['label']); ?></label>
                            <input wire:model.live="cunas_por_dia_detalle.<?php echo e($key); ?>" type="number" min="0" class="form-control" id="cunas_<?php echo e($key); ?>" placeholder="0">
                        </div>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-3">
            <label class="form-label"><?php echo e(__('Total de cuñas')); ?></label>
            <input type="text" class="form-control" value="<?php echo e($this->getTotalCunasPeriodo()); ?>" readonly>
        </div>
        <div class="col-md-3">
            <label class="form-label"><?php echo e(__('Valor unitario')); ?></label>
            <input type="text" class="form-control" value="<?php echo e($this->formatoMoneda($valor_unitario)); ?>" readonly>
        </div>
        <div class="col-md-3">
            <label class="form-label"><?php echo e(__('Valor neto')); ?></label>
            <input type="text" class="form-control" value="<?php echo e($this->formatoMoneda($valor_neto)); ?>" readonly>
        </div>
        <!--[if BLOCK]><![endif]--><?php if($usa_iva): ?>
        <div class="col-md-3">
            <label class="form-label"><?php echo e(__('IVA')); ?></label>
            <input type="text" class="form-control" value="<?php echo e($this->formatoMoneda($valor_iva)); ?>" readonly>
        </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>
    <div class="row mt-2">
        <!--[if BLOCK]><![endif]--><?php if($usa_iva): ?>
        <div class="col-md-3">
            <label class="form-label"><?php echo e(__('Total con IVA')); ?></label>
            <input type="text" class="form-control" value="<?php echo e($this->formatoMoneda($valor_total_con_iva)); ?>" readonly>
        </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        <div class="col-md-3 d-flex align-items-end">
            <!--[if BLOCK]><![endif]--><?php if($usa_iva): ?>
                <span class="badge bg-success text-white" aria-label="Emisora con IVA" tabindex="0">Emisora con IVA</span>
            <?php else: ?>
                <span class="badge bg-secondary text-white" aria-label="Emisora sin IVA" tabindex="0">Emisora sin IVA</span>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div>
    </div>
   
    <div class="alert alert-info mt-3" role="alert">
        <strong>Resumen de cálculo:</strong><br>
        (Precio base <!--[if BLOCK]><![endif]--><?php if($precio_venta > 0): ?> (<?php echo e($this->formatoMoneda($precio_venta)); ?>) <?php else: ?> <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        <!--[if BLOCK]><![endif]--><?php if(in_array($tipoProgramaSeleccionado, [9,10])): ?> x 1.30 (Noticiero) <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        <!--[if BLOCK]><![endif]--><?php if($tipo_cuna == 2): ?> x 1.30 (Mención) <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        x <?php echo e($duracion ?: 'Duración no seleccionada'); ?> (Duración)<br>
        x <?php echo e($this->getTotalCunasPeriodo()); ?> (Total de cuñas)
        <?php if($descuento > 0): ?> - <?php echo e($descuento); ?>% (Descuento) <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        <!--[if BLOCK]><![endif]--><?php if($bonificacion > 0): ?> - <?php echo e($this->formatoMoneda($bonificacion)); ?> (Bonificación) <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        <!--[if BLOCK]><![endif]--><?php if($usa_iva): ?> + 16% IVA <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        <br>
        <em>Valor neto final calculado según los factores seleccionados.</em>
        <!--[if BLOCK]><![endif]--><?php if(!$precio_base || !$precio_venta): ?>
            <br><span class="text-danger">Falta seleccionar el precio base o de venta.</span>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        <!--[if BLOCK]><![endif]--><?php if(!$duracion): ?>
            <br><span class="text-danger">Falta seleccionar la duración.</span>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        <!--[if BLOCK]><![endif]--><?php if(!$tipo_cuna): ?>
            <br><span class="text-danger">Falta seleccionar el tipo de pauta.</span>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        <!--[if BLOCK]><![endif]--><?php if($this->getTotalCunasPeriodo() == 0): ?>
            <br><span class="text-danger">Falta ingresar cuñas por día.</span>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>
</div>

<!-- Campos ocultos para trazabilidad -->
<input type="hidden" name="precio_base" value="<?php echo e($precio_base); ?>">
<input type="hidden" name="precio_venta" value="<?php echo e($precio_venta); ?>">
<input type="hidden" name="tipo_programa_id" value="<?php echo e($tipoProgramaSeleccionado); ?>">
<input type="hidden" name="factor_duracion" value="<?php echo e($duracion); ?>">
<input type="hidden" name="recargo_noticiero" value="<?php echo e(in_array($tipoProgramaSeleccionado, [9,10]) ? 1 : 0); ?>">
<input type="hidden" name="recargo_mencion" value="<?php echo e($tipo_cuna == 2 ? 1 : 0); ?>">
<input type="hidden" name="iva_aplicado" value="<?php echo e($usa_iva ? 16 : 0); ?>">
<input type="hidden" name="valor_iva" value="<?php echo e($valor_iva); ?>">
<input type="hidden" name="valor_total_con_iva" value="<?php echo e($valor_total_con_iva); ?>">
<input type="hidden" name="cunas_por_dia_detalle" value="<?php echo e(json_encode($cunas_por_dia_detalle)); ?>">

<!-- Campos ocultos requeridos para el request -->
<input type="hidden" name="programa_id" value="<?php echo e($emisoraProgramaSeleccionadoId); ?>">
<input type="hidden" name="horario" value="<?php echo e($programaSeleccionado->horario ?? ''); ?>">
<input type="hidden" name="cantidad_dias" value="<?php echo e($cantidad_dias_transmision); ?>">
<input type="hidden" name="cunas_por_dia" value="<?php echo e($cunas_por_dia); ?>">
<input type="hidden" name="valor_unitario" value="<?php echo e($valor_unitario); ?>">
<input type="hidden" name="valor_neto" value="<?php echo e($valor_neto); ?>">

<div class="col-md-12 mt20 mt-2">
    <button type="submit" class="btn btn-primary">Guardar</button>
</div>
</form>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.forEach(function (tooltipTriggerEl) {
        new bootstrap.Tooltip(tooltipTriggerEl);
    });
});
</script><?php /**PATH C:\xampp\htdocs\cradial\resources\views/livewire/filtro-programas-emisoras-edit.blade.php ENDPATH**/ ?>