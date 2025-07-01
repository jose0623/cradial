<div>
    
    <div class="row">
        <div class="col-md-10">
            <div class="row mb-3">
                <div class="col-md-2">
                    <input 
                        type="text" 
                        wire:model.live="search" 
                        class="form-control form-control-sm" 
                        placeholder="Nombre o dial..."
                    >
                </div>
                <div class="col-md-2">
                    <select wire:model.live="selectedEstado" class="form-control form-control-sm">
                        <option value="">Departamentos</option>
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $estados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($estado->id); ?>"><?php echo e($estado->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </select>
                </div>
                <div class="col-md-2">
                    <select wire:model.live="selectedMunicipio" class="form-control form-control-sm" <?php echo e(!$selectedEstado ? 'disabled' : ''); ?>>
                        <option value="">Municipios</option>
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $municipios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $municipio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($municipio->id); ?>"><?php echo e($municipio->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </select>
                </div>
                <div class="col-md-2">
                    <select wire:model.live="selectedTipoEmisora" class="form-control form-control-sm">
                        <option value="">Todos los tipos</option>
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $tiposEmisora; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($tipo->id); ?>"><?php echo e($tipo->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </select>
                </div>
                
                <div class="col-md-2"> 
                    <select wire:model.live="filterActiva" class="form-control form-control-sm">
                        <option value="">Todas las emisoras</option>
                        <option value="1">Activas</option>
                        <option value="0">Inactivas</option>
                    </select>
                </div>
                
            </div>
        </div>
        <div class="col-md-2">
             <div class="d-flex justify-content-between mb-3">
                    <div class="btn-group">
                        <button wire:click="exportExcel" class="btn btn-success btn-sm">
                            <i class="fa fa-file-excel"></i> Excel
                        </button>
                        <button wire:click="exportPdf" class="btn btn-danger btn-sm">
                            <i class="fa fa-file-pdf"></i> PDF
                        </button>
                    </div>
                </div>
        </div>
    </div>
    

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Nº </th>
                    <th wire:click="sortBy('name')" style="cursor: pointer;">
                        Nombre 
                        <!--[if BLOCK]><![endif]--><?php if($sortField === 'name'): ?>
                            <!--[if BLOCK]><![endif]--><?php if($sortDirection === 'asc'): ?>
                                <i class="fa fa-sort-up"></i>
                            <?php else: ?>
                                <i class="fa fa-sort-down"></i>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        <?php else: ?>
                            <i class="fa fa-sort"></i>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </th>
                    <th wire:click="sortBy('dial')" style="cursor: pointer;">
                        Dial
                        <!--[if BLOCK]><![endif]--><?php if($sortField === 'dial'): ?>
                            <!--[if BLOCK]><![endif]--><?php if($sortDirection === 'asc'): ?>
                                <i class="fa fa-sort-up"></i>
                            <?php else: ?>
                                <i class="fa fa-sort-down"></i>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        <?php else: ?>
                            <i class="fa fa-sort"></i>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </th>
                    <th>Tipo Emisora</th>
                    <th>Departamento</th>
                    <th>Municipio</th>
                    
                    <th wire:click="sortBy('emisora_activa')" style="cursor: pointer;">
                        Estado
                        <!--[if BLOCK]><![endif]--><?php if($sortField === 'emisora_activa'): ?>
                            <!--[if BLOCK]><![endif]--><?php if($sortDirection === 'asc'): ?>
                                <i class="fa fa-sort-up"></i>
                            <?php else: ?>
                                <i class="fa fa-sort-down"></i>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        <?php else: ?>
                            <i class="fa fa-sort"></i>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $emisoras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index =>  $emisora): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($emisoras->firstItem() + $index); ?></td>
                        <td><?php echo e($emisora->name); ?></td>
                        <td><?php echo e($emisora->dial); ?></td>
                        <td><?php echo e($emisora->tipoEmisora->name ?? 'N/A'); ?></td>
                        <td><?php echo e($emisora->municipio->estado->name ?? 'N/A'); ?></td>
                        <td><?php echo e($emisora->municipio->name ?? 'N/A'); ?></td>
                        
                        <td>
                            <!--[if BLOCK]><![endif]--><?php if($emisora->emisora_activa): ?>
                                <span class="badge bg-success">Activa</span>
                            <?php else: ?>
                                <span class="badge bg-danger">Inactiva</span>
                                <!--[if BLOCK]><![endif]--><?php if($emisora->observacion_estado_emisora): ?>
                                    <i class="fa fa-info-circle text-muted" title="<?php echo e($emisora->observacion_estado_emisora); ?>"></i>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </td>
                        
                        <td>
                            <div class="btn-group" role="group">
                                <a class="btn btn-sm btn-primary" href="<?php echo e(route('cobertura', $emisora->id)); ?>" title="Cobertura">
                                    <i class="fa fa-signal"></i>
                                </a>
                                <a class="btn btn-sm btn-info" href="<?php echo e(route('emisora.programas.index', $emisora->id)); ?>" title="Programas">
                                    <i class="fa fa-film"></i>
                                </a>
                                <a class="btn btn-sm btn-dark" href="<?php echo e(route('emisora.fiestas.index', $emisora->id)); ?>" title="Fiestas">
                                    <i class="fa fa-gifts"></i>
                                </a>
                                <a class="btn btn-sm btn-primary" href="<?php echo e(route('emisoras.show', $emisora->id)); ?>" title="Ver">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a class="btn btn-sm btn-success" href="<?php echo e(route('emisoras.edit', $emisora->id)); ?>" title="Editar">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <button 
                                    type="button" 
                                    class="btn btn-sm btn-danger"
                                    onclick="confirm('¿Estás seguro de eliminar?') && Livewire.dispatch('deleteEmisora', {id: <?php echo e($emisora->id); ?>})"
                                    title="Eliminar"
                                >
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="7" class="text-center">No se encontraron resultados</td> 
                    </tr>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-between align-items-center mt-3">
        <div>
            Mostrando <?php echo e($emisoras->firstItem()); ?> a <?php echo e($emisoras->lastItem()); ?> de <?php echo e($emisoras->total()); ?> registros
        </div>
        <?php echo e($emisoras->links()); ?>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\cradial\resources\views/livewire/emisora-search.blade.php ENDPATH**/ ?>