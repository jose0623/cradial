<?php $__env->startSection('title'); ?>
    <?php echo e(config('adminlte.title')); ?>

    <?php if (! empty(trim($__env->yieldContent('subtitle')))): ?> | <?php echo $__env->yieldContent('subtitle'); ?> <?php endif; ?>
<?php $__env->stopSection(); ?>

<style>
    .float-right {
        width: 50%;
    }
    .float-left {
        width: 50%;
    }
    .float-right a.btn.btnbr.btn-sm, .float-right .btnCreate {
        display: block;
        text-align: right;
        margin: 0 4px 0 auto;
        width: max-content;
    }
    td.float-right form {
        text-align: end;
    }
    .flex.justify-between.flex-1 {
        display: none;
    }
    nav.flex.items-center.justify-between {
        margin-bottom: 40px;
    }


    /* Para que la paginación de Livewire se vea bien */
    .flex.justify-between.flex-1.sm\:hidden {
        display: none;
    }

    .items-center.justify-between {
        justify-content: center !important;
    }

    /* En tu archivo app.css o en un tag style */
.pagination .page-item.active .page-link {
    background-color: #0d6efd;
    border-color: #0d6efd;
    color: white;
}

.pagination .page-link {
    color: #0d6efd;
}

.pagination .page-item.disabled .page-link {
    color: #6c757d;
}

nav.d-flex p.small.text-muted {
    display: none;
}

.btn-group {
    margin: 0 0 0 auto !important;
    display: block !important;
    width: max-content;
}

/* En tu archivo CSS */
.btn-export {
    margin-left: 5px;
    padding: 0.25rem 0.5rem;
    font-size: 0.875rem;
}

.btn-export i {
    margin-right: 5px;
}
</style>


<?php $__env->startSection('content_header'); ?>
    <?php if (! empty(trim($__env->yieldContent('content_header_title')))): ?>
        <h1 class="text-muted">
            <?php echo $__env->yieldContent('content_header_title'); ?>

            <?php if (! empty(trim($__env->yieldContent('content_header_subtitle')))): ?>
                <small class="text-dark">
                    <i class="fas fa-xs fa-angle-right text-muted"></i>
                    <?php echo $__env->yieldContent('content_header_subtitle'); ?>
                </small>
            <?php endif; ?>
        </h1>
    <?php endif; ?>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
    <?php echo $__env->yieldContent('content_body'); ?>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('footer'); ?>
    <div class="float-right">
        Version: <?php echo e(config('app.version', '1.0.0')); ?>

    </div>

    <strong>
        <a href="<?php echo e(config('app.company_url', '#')); ?>">
            <?php echo e(config('app.company_name', 'My company')); ?>

        </a>
    </strong>
<?php $__env->stopSection(); ?>



<?php $__env->startPush('js'); ?>
<script>

    $(document).ready(function() {
        // Add your common script logic here...
    });

</script>
<?php $__env->stopPush(); ?>



<?php $__env->startPush('css'); ?>
<style type="text/css">

    
    /*
    .card-header {
        border-bottom: none;
    }
    .card-title {
        font-weight: 600;
    }
    */

</style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cradial\resources\views/layouts/app.blade.php ENDPATH**/ ?>