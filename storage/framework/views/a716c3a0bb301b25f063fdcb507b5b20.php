<table>
    <tr>
        <td colspan="2">
            <img src="<?php echo e(public_path('/img/logo.png')); ?>" alt="Logo" height="90" />
        </td>
        <td colspan="7">
            <p>REPORTE DE CREDITOS</p>
        </td>
    </tr>
</table>

<table style="width: 100%; border-collapse: collapse;">
    <thead>
        <tr style="background-color: #CCCCCC; font-weight: bold;">
            <th style="border: 1px solid #000; width: 30px;">Id</th>
            <th style="border: 1px solid #000; width: 150px;">Cliente</th>
            <th style="border: 1px solid #000; width: 100px;">Telefono</th>
            <th style="border: 1px solid #000; width: 100px;">Monto</th>
            <th style="border: 1px solid #000; width: 80px;">Abonado</th>
            <th style="border: 1px solid #000; width: 120px;">Restante</th>
            <th style="border: 1px solid #000; width: 150px;">Fecha/Hora</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $creditos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $credito): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td style="border: 1px solid #000; text-align: left"><?php echo e($credito['id']); ?></td>
                <td style="border: 1px solid #000; text-align: left"><?php echo e($credito['nombre']); ?></td>
                <td style="border: 1px solid #000; text-align: left"><?php echo e($credito['telefono']); ?></td>
                <td style="border: 1px solid #000; text-align: left"><?php echo e($credito['total']); ?></td>
                <td style="border: 1px solid #000; text-align: left"><?php echo e($credito['abonado']); ?></td>
                <td style="border: 1px solid #000; text-align: left"><?php echo e($credito['restante']); ?></td>
                <td style="border: 1px solid #000; text-align: left"><?php echo e($credito['fecha']); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php /**PATH C:\laragon\www\sales\resources\views/venta/creditos/reporte.blade.php ENDPATH**/ ?>