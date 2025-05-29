<!DOCTYPE html>
<html>

<head>
    <title>Reporte ticket</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .ticket {
            width: 140pt;
            padding: 1px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .logo {
            text-align: center;
            margin-bottom: 0px;
        }

        .logo img {
            max-width: 50px;
            height: auto;
        }

        .business-info {
            text-align: center;
            font-size: 14px;
        }

        .ticket-details {
            margin-top: 20px;
            padding-top: 10px;
        }

        .ticket-details h3 {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .ticket-details p {
            font-size: 12px;
            margin: 5px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 1px;
            text-align: left;
            font-size: 11px;
        }

        .text-right {
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="ticket">
        <div class="business-info">
            <h3><?php echo e($company->nombre); ?></h3>
            <p><?php echo e($company->direccion); ?></p>
            <p><?php echo e($company->telefono); ?></p>
            <p><?php echo e($company->correo); ?></p>
        </div>
        ==================================
        <div class="ticket-details">
            <p>Fecha: <?php echo e($fecha . ' ' . $hora); ?></p>
            <p>Folio: <?php echo e($compra->id); ?></p>
            ==================================
            <p>Proveedor: <?php echo e($compra->nombre); ?></p>
            <p>Teléfono: <?php echo e($compra->telefono); ?></p>
            <p>Dirección: <?php echo e($compra->direccion); ?></p>
            <table>
                <thead>
                    <tr>
                        <th>Cant</th>
                        <th>Producto</th>
                        <th>Importe</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="3">==================================</td>
                    </tr>
                    <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($producto->cantidad); ?></td>
                            <td><?php echo e($producto->producto); ?></td>
                            <td><?php echo e($producto->precio); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                    
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3">==================================</td>
                    </tr>
                    <tr>
                        <td colspan="2">Total</td>
                        <td><h4><?php echo e(number_format($compra->total, 2)); ?></h4></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</body>

</html>
<?php
    header("Content-type: application/pdf");
?><?php /**PATH D:\laragon\www\TierraVivaCosmeticosPOS\resources\views/compra/ticket.blade.php ENDPATH**/ ?>