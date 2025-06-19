<div>

    <div class="row">
        <div class="col-md-4">
            <div>
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
                <select wire:model.live="emisoraSeleccionada" id="emisora" name="id_emisora" class="form-control" <?php if(!$emisorasFiltradas->count()): ?> disabled <?php endif; ?>>
                    <option value="">Seleccione una emisora</option>
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $emisorasFiltradas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emisora): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($emisora->id); ?>">
                            <?php echo e($emisora->name); ?>

                            <!--[if BLOCK]><![endif]--><?php if($emisora->es_direccion_fisica): ?> (Dirección Física) <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            <!--[if BLOCK]><![endif]--><?php if($emisora->es_por_region): ?> (Por Región) <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
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
                    <input wire:model.live="precio_base" type="text" name="precio" class="form-control" value=" <?php echo e($programaSeleccionado->costo); ?> | <?php echo e($programaSeleccionado->venta); ?> " readonly>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group mb-2 mb20">
                <label for="tipo_cuna" class="form-label"><?php echo e(__('Tipo de pauta')); ?></label>
                <select wire:model.live="tipo_cuna" required name="tipo_cuna" id="tipo_cuna" class="form-control">
                    <option value="">Seleccione...</option>
                    <option value="1">Cuña</option>
                    <option value="2">Mencion</option>
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
                <label for="duracion" class="form-label"><?php echo e(__('Duracion')); ?></label>
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
        <div class="col-md-4">
            <div class="form-group mb-2 mb20">
                <label for="cunas_por_dia" class="form-label"><?php echo e(__('Cunas Por Dia')); ?></label>
                <input wire:model.live="cunas_por_dia" type="number" name="cunas_por_dia" class="form-control <?php $__errorArgs = ['cunas_por_dia'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="1" id="cunas_por_dia" placeholder="Cunas Por Dia">
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['cunas_por_dia'];
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
                <label for="bonificacion" class="form-label"><?php echo e(__('Bonificacion')); ?></label>
                <input wire:model.live="bonificacion" type="number" name="bonificacion" class="form-control <?php $__errorArgs = ['bonificacion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="0" id="bonificacion" placeholder="Bonificacion">
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
                <label for="descuento" class="form-label"><?php echo e(__('Descuento')); ?></label>
                <input wire:model.live="descuento" type="number" name="descuento" class="form-control <?php $__errorArgs = ['descuento'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="0" id="descuento" placeholder="Descuento">
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
                <label for="valor_dia" class="form-label"><?php echo e(__('Valor x Dia')); ?></label>
                <input readonly type="number" name="valor_dia" class="form-control <?php $__errorArgs = ['valor_dia'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($valor_dia); ?>" id="valor_dia" placeholder="Valor dia">
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['valor_dia'];
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
    

    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
   
</div><?php /**PATH C:\xampp\htdocs\cradial\resources\views/livewire/filtro-programas-emisoras.blade.php ENDPATH**/ ?>