<?php $__env->startSection('title', 'Editar | ' . $producto->producto); ?>

<?php $__env->startSection('content'); ?>
    <div class="">
        <div class="col-md-12">

            <?php if ($__env->exists('partials.errors')) echo $__env->make('partials.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="card card-default">
                
                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('productos.update', $producto->id)); ?>" role="form"
                        enctype="multipart/form-data">
                        <?php echo e(method_field('PATCH')); ?>

                        <?php echo csrf_field(); ?>

                        <?php echo $__env->make('producto.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\sales\resources\views/producto/edit.blade.php ENDPATH**/ ?>