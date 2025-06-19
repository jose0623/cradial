<div>
    <!-- Barra de herramientas -->
    <div class="d-flex justify-content-between mb-3">
        <div>
            <select wire:model.live="perPage" class="form-select form-select-sm">
                <option value="10">10 por página</option>
                <option value="25">25 por página</option>
                <option value="50">50 por página</option>
                <option value="100">100 por página</option>
            </select>
        </div>
        <div class="btn-group">
            <button wire:click="exportExcel" class="btn btn-success btn-sm">
                <i class="fa fa-file-excel"></i> Excel
            </button>
            <button wire:click="exportPdf" class="btn btn-danger btn-sm">
                <i class="fa fa-file-pdf"></i> PDF
            </button>
        </div>
    </div>

    <!-- Buscador -->
    <div class="mb-3">
        <input 
            type="text" 
            wire:model.live="search" 
            class="form-control" 
            placeholder="Buscar programas por nombre, locutor, horario o tipo..."
        >
    </div>

    <!-- Tabla de resultados -->
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>    
                    <th>Nº</th>
                    <th wire:click="sortBy('nombre_programa')" style="cursor: pointer;">
                        Programa
                        <!--[if BLOCK]><![endif]--><?php if($sortField === 'nombre_programa'): ?>
                            <!--[if BLOCK]><![endif]--><?php if($sortDirection === 'asc'): ?>
                                <i class="fa fa-sort-up"></i>
                            <?php else: ?>
                                <i class="fa fa-sort-down"></i>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        <?php else: ?>
                            <i class="fa fa-sort"></i>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </th>
                    <th>Tipo</th>
                    <th>L</th>
                    <th>M</th>
                    <th>MI</th>
                    <th>J</th>
                    <th>V</th>
                    <th>S</th>
                    <th>D</th>
                    <th wire:click="sortBy('horario')" style="cursor: pointer;">
                        Horario
                        <!--[if BLOCK]><![endif]--><?php if($sortField === 'horario'): ?>
                            <!--[if BLOCK]><![endif]--><?php if($sortDirection === 'asc'): ?>
                                <i class="fa fa-sort-up"></i>
                            <?php else: ?>
                                <i class="fa fa-sort-down"></i>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        <?php else: ?>
                            <i class="fa fa-sort"></i>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </th>
                    <th>Locutor</th>
                    <th>Act</th>
                    <th wire:click="sortBy('costo')" style="cursor: pointer;">
                        Costo
                        <!--[if BLOCK]><![endif]--><?php if($sortField === 'costo'): ?>
                            <!--[if BLOCK]><![endif]--><?php if($sortDirection === 'asc'): ?>
                                <i class="fa fa-sort-up"></i>
                            <?php else: ?>
                                <i class="fa fa-sort-down"></i>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        <?php else: ?>
                            <i class="fa fa-sort"></i>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </th>
                    <th wire:click="sortBy('venta')" style="cursor: pointer;">Venta</th>
                    <th style="text-align: right;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $emisoraProgramas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $emisoraPrograma): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($emisoraProgramas->firstItem() + $index); ?></td>
                        <td><?php echo e($emisoraPrograma->nombre_programa); ?></td>
                        <td><?php echo e($emisoraPrograma->tipoPrograma->name ?? 'N/A'); ?></td>
                        <td><?php echo e($emisoraPrograma->lunes ? '✓' : ''); ?></td>
                        <td><?php echo e($emisoraPrograma->martes ? '✓' : ''); ?></td>
                        <td><?php echo e($emisoraPrograma->miercoles ? '✓' : ''); ?></td>
                        <td><?php echo e($emisoraPrograma->jueves ? '✓' : ''); ?></td>
                        <td><?php echo e($emisoraPrograma->viernes ? '✓' : ''); ?></td>
                        <td><?php echo e($emisoraPrograma->sabado ? '✓' : ''); ?></td>
                        <td><?php echo e($emisoraPrograma->domingo ? '✓' : ''); ?></td>
                        <td><?php echo e($emisoraPrograma->horario); ?></td>
                        <td><?php echo e($emisoraPrograma->nombre_locutor); ?></td>
                        <td><?php echo e($emisoraPrograma->activo ? '✓' : ''); ?></td>
                        <td><?php echo e(number_format($emisoraPrograma->costo, 2)); ?></td>
                        <td><?php echo e(number_format($emisoraPrograma->venta, 2)); ?></td>
                        <td style="min-width: 240px;text-align: right;">
                            <form action="<?php echo e(route('emisora.programas.destroy', $emisoraPrograma->id)); ?>" method="POST"  style="margin: 0;">
                                <a class="btn btn-sm btn-primary " href="<?php echo e(route('emisora.programas.show', $emisoraPrograma->id)); ?>">
                                    <i class="fa fa-fw fa-eye"></i>
                                </a>
                                <a class="btn btn-sm btn-success" href="<?php echo e(route('emisora.programas.edit', $emisoraPrograma->id)); ?>">
                                    <i class="fa fa-fw fa-edit"></i>
                                </a>
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('¿Estás seguro de eliminar?') ? this.closest('form').submit() : false;">
                                    <i class="fa fa-fw fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="14" class="text-center">No se encontraron programas</td>
                    </tr>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="d-flex justify-content-between align-items-center mt-3">
        <div>
            Mostrando <?php echo e($emisoraProgramas->firstItem()); ?> a <?php echo e($emisoraProgramas->lastItem()); ?> de <?php echo e($emisoraProgramas->total()); ?> registros
        </div>
        <?php echo e($emisoraProgramas->links()); ?>

    </div>
</div><?php /**PATH C:\xampp\htdocs\cradial\resources\views/livewire/emisora-programa-search.blade.php ENDPATH**/ ?>