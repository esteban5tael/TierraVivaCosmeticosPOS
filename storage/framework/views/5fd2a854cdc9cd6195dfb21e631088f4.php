<div class="box box-info padding-1">
    <div class="box-body row">        
        <div class="form-group col-md-4">
            <?php echo e(Form::label('codigo')); ?>

            <?php echo e(Form::text('codigo', $producto->codigo, ['class' => 'form-control' . ($errors->has('codigo') ? ' is-invalid' : ''), 'placeholder' => 'Codigo'])); ?>

            <?php echo $errors->first('codigo', '<div class="invalid-feedback">:message</div>'); ?>

        </div>
        <div class="form-group col-md-5">
            <?php echo e(Form::label('producto')); ?>

            <?php echo e(Form::text('producto', $producto->producto, ['class' => 'form-control' . ($errors->has('producto') ? ' is-invalid' : ''), 'placeholder' => 'Producto'])); ?>

            <?php echo $errors->first('producto', '<div class="invalid-feedback">:message</div>'); ?>

        </div>
        <div class="form-group col-md-3">
            <?php echo e(Form::label('precio_compra')); ?>

            <?php echo e(Form::text('precio_compra', $producto->precio_compra, ['class' => 'form-control' . ($errors->has('precio_compra') ? ' is-invalid' : ''), 'placeholder' => 'Precio Compra'])); ?>

            <?php echo $errors->first('precio_compra', '<div class="invalid-feedback">:message</div>'); ?>

        </div>
        <div class="form-group col-md-4">
            <?php echo e(Form::label('precio_venta')); ?>

            <?php echo e(Form::text('precio_venta', $producto->precio_venta, ['class' => 'form-control' . ($errors->has('precio_venta') ? ' is-invalid' : ''), 'placeholder' => 'Precio Venta'])); ?>

            <?php echo $errors->first('precio_venta', '<div class="invalid-feedback">:message</div>'); ?>

        </div>
        <div class="form-group col-md-4">
            <?php echo e(Form::label('stock')); ?>

            <?php echo e(Form::text('stock', $producto->stock, ['class' => 'form-control' . ($errors->has('stock') ? ' is-invalid' : ''), 'placeholder' => 'Stock'])); ?>

            <?php echo $errors->first('stock', '<div class="invalid-feedback">:message</div>'); ?>

        </div>
        <div class="form-group col-md-4">
            <?php echo e(Form::label('id_categoria', 'Categoría:')); ?>

            <?php echo Form::select('id_categoria', $categorias, $producto->id_categoria, ['class' => 'form-control', 'placeholder' => 'Selecciona una categoría']); ?>

        </div>
        <div class="form-group col-md-4">
            <?php echo e(Form::label('foto', 'Foto')); ?>

            <?php echo e(Form::file('foto', ['class' => 'form-control' . ($errors->has('foto') ? ' is-invalid' : ''), 'placeholder' => 'Foto'])); ?>

            <?php echo $errors->first('foto', '<div class="invalid-feedback">:message</div>'); ?>

            <?php if($producto->foto): ?>
                <img src="<?php echo e(asset('storage/' . $producto->foto)); ?>" alt="Imagen actual" style="max-width: 100px; max-height: 100px;">
            <?php else: ?>
                <p>Sin imagen</p>
            <?php endif; ?>
        </div>        

    </div>
    <div class="box-footer mt20 text-right">
        <a href="<?php echo e(route('productos.index')); ?>" class="btn btn-danger"><?php echo e(__('Cancel')); ?></a>
        <button type="submit" class="btn btn-primary"><?php echo e(__('Submit')); ?></button>
    </div>
</div><?php /**PATH C:\laragon\www\sales\resources\views/producto/form.blade.php ENDPATH**/ ?>