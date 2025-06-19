<?php $__env->startSection('template_title'); ?>
    <?php echo e(__('Create')); ?> Emisora
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<style>
    select, [type="text"] {
        text-transform: uppercase;
    }
</style>

<br>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title"><?php echo e(__('Crear')); ?> Emisora</span>
                        <div class="float-right">
                            <a href="<?php echo e(route('emisoras.index')); ?>" class="btn btnbr btn-secondary btn-sm float-right me-2">
                                <?php echo e(__('Regresar a Emisoras')); ?>

                            </a>
                          </div>
                    </div>

                    <div class="card-body bg-white">
                        <form method="POST" action="<?php echo e(route('emisoras.store')); ?>"  role="form" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            <?php echo $__env->make('emisora.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const monedaInputs = document.querySelectorAll('input.moneda');
    
            monedaInputs.forEach(input => {
                // Función para formatear el número como moneda sin decimales
                function formatCurrencyWithoutDecimals(value) {
                    if (!value) {
                        return '';
                    }
    
                    // Eliminar cualquier carácter que no sea número
                    const numericValue = value.replace(/[^\d]/g, '');
    
                    // Formatear la parte entera con puntos
                    const formattedIntegerPart = numericValue.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    
                    return formattedIntegerPart;
                }
    
                // Evento 'input' para formatear mientras se escribe
                input.addEventListener('input', function() {
                    this.value = formatCurrencyWithoutDecimals(this.value);
                });
    
                // Evento 'blur' para reformatear al perder el foco (opcional, para asegurar el formato)
                input.addEventListener('blur', function() {
                    this.value = formatCurrencyWithoutDecimals(this.value);
                });
    
                // Inicializar el formato al cargar la página
                if (input.value) {
                    input.value = formatCurrencyWithoutDecimals(input.value);
                }
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const telInputs = document.querySelectorAll('input[type="tel"]');
    
            telInputs.forEach(input => {
                input.addEventListener('input', function() {
                    // Eliminar cualquier carácter que no sea número
                    let cleanedValue = this.value.replace(/\D/g, '');
                    let formattedValue = '';
    
                    // Aplicar una máscara simple (ejemplo: XXX-XXX-XXXX)
                    for (let i = 0; i < cleanedValue.length; i++) {
                        if (i === 3 || i === 6) {
                            formattedValue += '-';
                        }
                        formattedValue += cleanedValue[i];
                    }
    
                    this.value = formattedValue;
                });
            });
        });
    </script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cradial\resources\views/emisora/create.blade.php ENDPATH**/ ?>