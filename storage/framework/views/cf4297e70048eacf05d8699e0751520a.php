<table>
    <tr>
        <td colspan="2">
            <img src="<?php echo e(public_path('/img/logo.png')); ?>" alt="Logo" height="90" />
        </td>
        <td colspan="7">
            <p>REPORTE DE PRODUCTOS</p>
        </td>
    </tr>
</table>

<table style="width: 100%; border-collapse: collapse;">
    <thead>
        <tr style="background-color: #CCCCCC; font-weight: bold;">
            <th style="border: 1px solid #000; width: 30px;">Id</th>
            <th style="border: 1px solid #000; width: 100px;">Código</th>
            <th style="border: 1px solid #000; width: 200px;">Producto</th>
            <th style="border: 1px solid #000; width: 120px;">Precio Compra</th>
            <th style="border: 1px solid #000; width: 120px;">Precio Venta</th>
            <th style="border: 1px solid #000; width: 80px;">Stock</th>
            <th style="border: 1px solid #000; width: 100px;">Categoria</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td style="border: 1px solid #000; text-align: left"><?php echo e($producto->id); ?></td>
                <td style="border: 1px solid #000; text-align: left"><?php echo e($producto->codigo); ?></td>
                <td style="border: 1px solid #000; text-align: left"><?php echo e($producto->producto); ?></td>
                <td style="border: 1px solid #000; text-align: left"><?php echo e($producto->precio_compra); ?></td>
                <td style="border: 1px solid #000; text-align: left"><?php echo e($producto->precio_venta); ?></td>
                <td style="border: 1px solid #000; text-align: left"><?php echo e($producto->stock); ?></td>
                <td style="border: 1px solid #000; text-align: left"><?php echo e($producto->categoria->nombre); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php /**PATH C:\laragon\www\sales\resources\views/producto/reporte.blade.php ENDPATH**/ ?>