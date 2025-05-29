<div class="box box-info padding-1">
    <div class="box-body row">
        <div class="form-group col-md-4">
            <?php echo e(Form::label('N° de Identificación Fiscal')); ?>

            <?php echo e(Form::text('identidad', $proveedor->identidad, ['class' => 'form-control' . ($errors->has('identidad') ? ' is-invalid' : ''), 'placeholder' => '(NIF) o RUC'])); ?>

            <?php echo $errors->first('identidad', '<div class="invalid-feedback">:message</div>'); ?>

        </div>       
        <div class="form-group col-md-4">
            <?php echo e(Form::label('nombre')); ?>

            <?php echo e(Form::text('nombre', $proveedor->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre'])); ?>

            <?php echo $errors->first('nombre', '<div class="invalid-feedback">:message</div>'); ?>

        </div>
        <div class="form-group col-md-4">
            <?php echo e(Form::label('telefono')); ?>

            <?php echo e(Form::number('telefono', $proveedor->telefono, ['class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => 'Teléfono'])); ?>

            <?php echo $errors->first('telefono', '<div class="invalid-feedback">:message</div>'); ?>

        </div>
        <div class="form-group col-md-4">
            <?php echo e(Form::label('correo')); ?>

            <?php echo e(Form::text('correo', $proveedor->correo, ['class' => 'form-control' . ($errors->has('correo') ? ' is-invalid' : ''), 'placeholder' => 'Correo'])); ?>

            <?php echo $errors->first('correo', '<div class="invalid-feedback">:message</div>'); ?>

        </div>
        <div class="form-group col-md-5">
            <?php echo e(Form::label('Dirección')); ?>

            <?php echo e(Form::textarea('direccion', $proveedor->direccion ?? '', ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Dirección', 'rows' => 3])); ?>

            <?php echo $errors->first('direccion', '<div class="invalid-feedback">:message</div>'); ?>

        </div>       

    </div>
    <div class="box-footer mt20 text-right">
        <a href="<?php echo e(route('proveedores.index')); ?>" class="btn btn-danger"><?php echo e(__('Cancel')); ?></a>
        <button type="submit" class="btn btn-primary"><?php echo e(__('Submit')); ?></button>
    </div>
</div><?php /**PATH D:\laragon\www\TierraVivaCosmeticosPOS\resources\views/proveedor/form.blade.php ENDPATH**/ ?>