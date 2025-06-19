<div>

    <div class="row">
        <div class="col-10">
            <!-- Buscador -->
            <div class="mb-3">
                <input 
                    type="text" 
                    wire:model.live="search" 
                    class="form-control" 
                    placeholder="Buscar tipo de emisora..."
                >
            </div>
        </div>
        <div class="col-2">
            <!-- Barra de herramientas -->
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
    
    

    <!-- Tabla de resultados -->
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>N°</th>
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
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $tipoEmisoras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $tipoEmisora): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($tipoEmisoras->firstItem() + $index); ?></td> <!-- Numeración consecutiva -->
                        <td><?php echo e($tipoEmisora->name); ?></td>
                        <td>
                            <form action="<?php echo e(route('tipo-emisoras.destroy', $tipoEmisora->id)); ?>" method="POST">
                                <a class="btn btn-sm btn-primary" href="<?php echo e(route('tipo-emisoras.show', $tipoEmisora->id)); ?>">
                                    <i class="fa fa-eye"></i> Ver
                                </a>
                                <a class="btn btn-sm btn-success" href="<?php echo e(route('tipo-emisoras.edit', $tipoEmisora->id)); ?>">
                                    <i class="fa fa-edit"></i> Editar
                                </a>
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('¿Estás seguro de eliminar?') ? this.closest('form').submit() : false;">
                                    <i class="fa fa-trash"></i> Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="2" class="text-center">No se encontraron resultados</td>
                    </tr>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="d-flex justify-content-between align-items-center mt-3">
        <div>
            Mostrando <?php echo e($tipoEmisoras->firstItem()); ?> a <?php echo e($tipoEmisoras->lastItem()); ?> de <?php echo e($tipoEmisoras->total()); ?> registros
        </div>
        <?php echo e($tipoEmisoras->links()); ?>

    </div>
</div><?php /**PATH C:\xampp\htdocs\cradial\resources\views/livewire/tipo-emisora-search.blade.php ENDPATH**/ ?>