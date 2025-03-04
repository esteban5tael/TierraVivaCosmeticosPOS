<div class="box box-info padding-1">
    <div class="box-body row">        
        <div class="form-group col-md-4">
            <?php echo e(Form::label('name')); ?>

            <?php echo e(Form::text('name', $usuario->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre'])); ?>

            <?php echo $errors->first('name', '<div class="invalid-feedback">:message</div>'); ?>

        </div>
        <div class="form-group col-md-3">
            <?php echo e(Form::label('email')); ?>

            <?php echo e(Form::text('email', $usuario->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Correo'])); ?>

            <?php echo $errors->first('email', '<div class="invalid-feedback">:message</div>'); ?>

        </div>
        <div class="form-group col-md-5">
            <?php echo e(Form::label('password')); ?>

            <?php echo e(Form::text('password', null, ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'Contraseña'])); ?>

            <?php echo $errors->first('password', '<div class="invalid-feedback">:message</div>'); ?>

        </div>       

    </div>
    <div class="box-footer mt20 text-right">
        <a href="<?php echo e(route('usuarios.index')); ?>" class="btn btn-danger"><?php echo e(__('Cancel')); ?></a>
        <button type="submit" class="btn btn-primary"><?php echo e(__('Submit')); ?></button>
    </div>
</div><?php /**PATH C:\laragon\www\sales\resources\views/usuario/form.blade.php ENDPATH**/ ?>