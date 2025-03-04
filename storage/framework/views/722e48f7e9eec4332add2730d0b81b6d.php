<?php $__env->startSection('title', 'Nuevo proveedor'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">

            <?php if ($__env->exists('partials.errors')) echo $__env->make('partials.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="card card-default">
                
                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('proveedores.store')); ?>" role="form" autocomplete="off">
                        <?php echo csrf_field(); ?>

                        <?php echo $__env->make('proveedor.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\sales\resources\views/proveedor/create.blade.php ENDPATH**/ ?>