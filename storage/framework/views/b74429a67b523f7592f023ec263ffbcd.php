<table>
    <tr>
        <td colspan="2">
            <img src="<?php echo e(public_path('/img/logo.png')); ?>" alt="Logo" height="90" />
        </td>
        <td colspan="7">
            <p>REPORTE DE COMPRAS</p>
        </td>
    </tr>
</table>

<table style="width: 100%; border-collapse: collapse;">
    <thead>
        <tr style="background-color: #CCCCCC; font-weight: bold;">
            <th style="border: 1px solid #000; width: 30px;">Id</th>
            <th style="border: 1px solid #000; width: 150px;">Proveedor</th>
            <th style="border: 1px solid #000; width: 100px;">Telefono</th>
            <th style="border: 1px solid #000; width: 80px;">Monto</th>
            <th style="border: 1px solid #000; width: 150px;">Fecha/Hora</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $compras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $compra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td style="border: 1px solid #000; text-align: left"><?php echo e($compra->id); ?></td>
                <td style="border: 1px solid #000; text-align: left"><?php echo e($compra->proveedor->nombre); ?></td>
                <td style="border: 1px solid #000; text-align: left"><?php echo e($compra->proveedor->telefono); ?></td>
                <td style="border: 1px solid #000; text-align: left"><?php echo e($compra->total); ?></td>
                <td style="border: 1px solid #000; text-align: left"><?php echo e($compra->created_at); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php /**PATH C:\laragon\www\sales\resources\views/compra/reporte.blade.php ENDPATH**/ ?>