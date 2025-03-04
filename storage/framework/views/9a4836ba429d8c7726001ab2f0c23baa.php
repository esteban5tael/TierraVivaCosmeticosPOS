<table>
    <tr>
        <td colspan="2">
            <img src="<?php echo e(public_path('/img/logo.png')); ?>" alt="Logo" height="90" />
        </td>
        <td colspan="7">
            <p>REPORTE DE CLIENTES</p>
        </td>
    </tr>
</table>

<table style="width: 100%; border-collapse: collapse;">
    <thead>
        <tr style="background-color: #CCCCCC; font-weight: bold;">
            <th style="border: 1px solid #000; width: 30px;">Id</th>
            <th style="border: 1px solid #000; width: 200px;">Nombre</th>
            <th style="border: 1px solid #000; width: 120px;">Correo</th>
            <th style="border: 1px solid #000; width: 100px;">Teléfono</th>
            <th style="border: 1px solid #000; width: 180px;">Direccion</th>
            <th style="border: 1px solid #000; width: 100px;">Limite Crédito</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td style="border: 1px solid #000; text-align: left"><?php echo e($cliente->id); ?></td>
                <td style="border: 1px solid #000; text-align: left"><?php echo e($cliente->nombre); ?></td>
                <td style="border: 1px solid #000; text-align: left"><?php echo e($cliente->correo); ?></td>
                <td style="border: 1px solid #000; text-align: left"><?php echo e($cliente->telefono); ?></td>
                <td style="border: 1px solid #000; text-align: left"><?php echo e($cliente->direccion); ?></td>
                <td style="border: 1px solid #000; text-align: left"><?php echo e($cliente->credito); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php /**PATH C:\laragon\www\sales\resources\views/cliente/reporte.blade.php ENDPATH**/ ?>