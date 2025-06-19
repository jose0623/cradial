

<?php $__env->startSection('template_title'); ?>
    Usuarios
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <br>
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                <?php echo e(__('Gestión de Usuarios')); ?>

                            </span>

                            <div class="float-right">
                                <a href="<?php echo e(route('users.create')); ?>" class="btn btnbr btn-primary btn-sm float-right" data-placement="left">
                                    <?php echo e(__('Crear Nuevo Usuario')); ?>

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
                                        <th>Nombre</th>
                                        <th>Email</th>
                                        <th>Rol</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; ?>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e(++$i); ?></td>
                                            <td><?php echo e($user->name); ?></td>
                                            <td><?php echo e($user->email); ?></td>
                                            <td>
                                                <?php switch($user->role):
                                                    case ('admin'): ?>
                                                        <span class="badge bg-danger">Administrador</span>
                                                        <?php break; ?>
                                                    <?php case ('editor'): ?>
                                                        <span class="badge bg-warning">Editor</span>
                                                        <?php break; ?>
                                                    <?php default: ?>
                                                        <span class="badge bg-info">Usuario</span>
                                                <?php endswitch; ?>
                                            </td>
                                            <td>
                                                <form action="<?php echo e(route('users.destroy',$user->id)); ?>" method="POST">
                                                    <a class="btn btn-sm btn-primary" href="<?php echo e(route('users.edit',$user->id)); ?>">
                                                        <i class="fa fa-fw fa-edit"></i> Editar
                                                    </a>
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este usuario?')">
                                                        <i class="fa fa-fw fa-trash"></i> Eliminar
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php echo $users->links(); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cradial\resources\views/users/index.blade.php ENDPATH**/ ?>