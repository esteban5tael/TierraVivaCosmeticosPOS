<?php $__env->startSection('title', 'Abrir caja'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">

            <?php if ($__env->exists('partials.errors')) echo $__env->make('partials.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="card card-default">
                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('cajas.store')); ?>" role="form" autocomplete="off">
                        <?php echo csrf_field(); ?>

                        <div class="box box-info padding-1">
                            <div class="box-body row">
                                <div class="form-group col-md-12">
                                    <?php echo e(Form::label('Monto Inicial')); ?>

                                    <?php echo e(Form::text('monto_inicial', $caja->monto_inicial, ['class' => 'form-control' . ($errors->has('monto_inicial') ? ' is-invalid' : ''), 'placeholder' => '0.00'])); ?>

                                    <?php echo $errors->first('monto_inicial', '<div class="invalid-feedback">:message</div>'); ?>

                                </div>

                            </div>
                            <div class="box-footer mt20 text-right">
                                <a href="<?php echo e(route('cajas.index')); ?>" class="btn btn-danger"><?php echo e(__('Cancel')); ?></a>
                                <button type="submit" class="btn btn-primary"><?php echo e(__('Submit')); ?></button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\sales\resources\views/caja/create.blade.php ENDPATH**/ ?>