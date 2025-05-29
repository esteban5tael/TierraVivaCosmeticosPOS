<div class="box box-info padding-1">
    <div class="box-body row">        
        <div class="form-group col-md-12">
            <?php echo e(Form::label('nombre')); ?>

            <?php echo e(Form::text('nombre', $categoria->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre'])); ?>

            <?php echo $errors->first('nombre', '<div class="invalid-feedback">:message</div>'); ?>

        </div>   
    </div>
    <div class="box-footer mt20 text-right">
        <a href="<?php echo e(route('categorias.index')); ?>" class="btn btn-danger"><?php echo e(__('Cancel')); ?></a>
        <button type="submit" class="btn btn-primary"><?php echo e(__('Submit')); ?></button>
    </div>
</div><?php /**PATH D:\laragon\www\TierraVivaCosmeticosPOS\resources\views/categoria/form.blade.php ENDPATH**/ ?>