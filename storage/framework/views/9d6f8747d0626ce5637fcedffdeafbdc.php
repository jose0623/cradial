<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div>
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('filtro-programas-emisoras', [
                'vigencia_desde' => $vigencia_desde,
                'vigencia_hasta' => $vigencia_hasta,
            ]);

$__html = app('livewire')->mount($__name, $__params, 'lw-1151788826-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </div>
        <br>
       
    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary"><?php echo e(__('Submit')); ?></button>
    </div>
</div>



<?php /**PATH C:\xampp\htdocs\cradial\resources\views/reporte-item/form.blade.php ENDPATH**/ ?>