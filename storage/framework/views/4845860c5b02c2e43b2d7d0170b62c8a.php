<div class="box box-info padding-1">
    <div class="box-body row">
        <div class="form-group col-md-3">
            <?php echo e(Form::label('monto')); ?>

            <?php echo e(Form::text('monto', $gasto->monto ?? '', ['class' => 'form-control' . ($errors->has('monto') ? ' is-invalid' : ''), 'placeholder' => 'Monto'])); ?>

            <?php echo $errors->first('monto', '<div class="invalid-feedback">:message</div>'); ?>

        </div>

        <div class="form-group col-md-9">
            <?php echo e(Form::label('descripcion')); ?>

            <?php echo e(Form::textarea('descripcion', $gasto->descripcion ?? '', ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripción', 'rows' => 3])); ?>

            <?php echo $errors->first('descripcion', '<div class="invalid-feedback">:message</div>'); ?>

        </div>

        <div class="form-group col-md-6">
            <?php echo e(Form::label('foto')); ?>

            <?php echo e(Form::file('foto', ['class' => 'form-control' . ($errors->has('foto') ? ' is-invalid' : '')])); ?>

            <?php echo $errors->first('foto', '<div class="invalid-feedback">:message</div>'); ?>

        </div>
    </div>

    <div class="box-footer mt20 text-right">
        <a href="<?php echo e(route('gastos.index')); ?>" class="btn btn-danger"><?php echo e(__('Cancel')); ?></a>
        <button type="submit" class="btn btn-primary"><?php echo e(__('Submit')); ?></button>
    </div>
</div>
<?php /**PATH C:\laragon\www\sales\resources\views/gastos/form.blade.php ENDPATH**/ ?>