<?php $__env->startSection('title', 'Datos de empresa'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            <?php echo e(__('Compania')); ?>

                        </span>

                    </div>
                </div>
                <div class="card-body">
                    <?php if($message = Session::get('success')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e($message); ?>

                        </div>
                    <?php endif; ?>
                    <form method="POST" action="<?php echo e(route('compania.update', $compania)); ?>" role="form" autocomplete="off">
                        <?php echo e(method_field('PUT')); ?>


                        <?php echo csrf_field(); ?>

                        <div class="box box-info padding-1">
                            <div class="box-body row">
                                <div class="form-group col-md-4">
                                    <?php echo e(Form::label('nombre')); ?>

                                    <?php echo e(Form::text('nombre', $compania->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre'])); ?>

                                    <?php echo $errors->first('nombre', '<div class="invalid-feedback">:message</div>'); ?>

                                </div>
                                <div class="form-group col-md-4">
                                    <?php echo e(Form::label('telefono')); ?>

                                    <?php echo e(Form::text('telefono', $compania->telefono, ['class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => 'Teléfono'])); ?>

                                    <?php echo $errors->first('telefono', '<div class="invalid-feedback">:message</div>'); ?>

                                </div>
                                <div class="form-group col-md-4">
                                    <?php echo e(Form::label('correo')); ?>

                                    <?php echo e(Form::text('correo', $compania->correo, ['class' => 'form-control' . ($errors->has('correo') ? ' is-invalid' : ''), 'placeholder' => 'Correo'])); ?>

                                    <?php echo $errors->first('correo', '<div class="invalid-feedback">:message</div>'); ?>

                                </div>
                                <div class="form-group col-md-5">
                                    <?php echo e(Form::label('direccion')); ?>

                                    <?php echo e(Form::text('direccion', $compania->direccion, ['class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => 'Dirección'])); ?>

                                    <?php echo $errors->first('direccion', '<div class="invalid-feedback">:message</div>'); ?>

                                </div>

                            </div>
                            <div class="box-footer mt20 text-right">
                                <button type="submit" class="btn btn-primary"><?php echo e(__('Submit')); ?></button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\sales\resources\views/compania/index.blade.php ENDPATH**/ ?>