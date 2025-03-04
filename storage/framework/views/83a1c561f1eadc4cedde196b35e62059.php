<?php $__env->startSection('title', 'Nuevo gastos'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">

            <?php if ($__env->exists('partials.errors')) echo $__env->make('partials.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="card card-default">
                <div class="card-body">
                    <?php if($message = Session::get('error')): ?>
                        <div class="alert fade_error .fade">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                            <strong><?php echo e($message); ?></strong>
                        </div>
                    <?php endif; ?>
                    <form method="POST" action="<?php echo e(route('gastos.store')); ?>" role="form" autocomplete="off" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <?php echo $__env->make('gastos.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\sales\resources\views/gastos/create.blade.php ENDPATH**/ ?>