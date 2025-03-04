<div class="box box-info padding-1">
    <div class="box-body row">        
        <div class="form-group col-md-4">
            <?php echo e(Form::label('nombre')); ?>

            <?php echo e(Form::text('nombre', $cliente->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre'])); ?>

            <?php echo $errors->first('nombre', '<div class="invalid-feedback">:message</div>'); ?>

        </div>
        <div class="form-group col-md-4">
            <?php echo e(Form::label('telefono')); ?>

            <?php echo e(Form::text('telefono', $cliente->telefono, ['class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => 'Teléfono'])); ?>

            <?php echo $errors->first('telefono', '<div class="invalid-feedback">:message</div>'); ?>

        </div>
        <div class="form-group col-md-4">
            <?php echo e(Form::label('correo')); ?>

            <?php echo e(Form::text('correo', $cliente->correo, ['class' => 'form-control' . ($errors->has('correo') ? ' is-invalid' : ''), 'placeholder' => 'Correo'])); ?>

            <?php echo $errors->first('correo', '<div class="invalid-feedback">:message</div>'); ?>

        </div>
        <div class="form-group col-md-3">
            <?php echo e(Form::label('Limite Crédito')); ?>

            <?php echo e(Form::number('credito', $cliente->credito, ['class' => 'form-control' . ($errors->has('credito') ? ' is-invalid' : ''), 'placeholder' => 'Limite Crédito', 'min' => '0.01', 'step' => '0.01'])); ?>

            <?php echo $errors->first('credito', '<div class="invalid-feedback">:message</div>'); ?>

        </div>
        <div class="form-group col-md-5">
            <?php echo e(Form::label('Dirección')); ?>

            <?php echo e(Form::textarea('direccion', $cliente->direccion ?? '', ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Dirección', 'rows' => 3])); ?>

            <?php echo $errors->first('direccion', '<div class="invalid-feedback">:message</div>'); ?>

        </div>        

    </div>
    <div class="box-footer mt20 text-right">
        <a href="<?php echo e(route('clientes.index')); ?>" class="btn btn-danger"><?php echo e(__('Cancel')); ?></a>
        <button type="submit" class="btn btn-primary"><?php echo e(__('Submit')); ?></button>
    </div>
</div><?php /**PATH C:\laragon\www\sales\resources\views/cliente/form.blade.php ENDPATH**/ ?>