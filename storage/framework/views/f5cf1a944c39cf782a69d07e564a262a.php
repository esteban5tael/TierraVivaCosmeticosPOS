<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiple Barcodes PDF</title>
    <style>
        /* Estilos CSS para las columnas */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            text-align: center;
            vertical-align: middle;
            padding: 10px; /* Ajusta el espaciado interno según sea necesario */
        }
    </style>
</head>
<body>
    <table>
        <?php $__currentLoopData = $barcodes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $barcode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($index % 3 == 0): ?>
                <tr>
            <?php endif; ?>
            <td>
                <?php echo $barcode['barcode']; ?>

                <?php echo e($barcode['codigo']); ?>

            </td>
            <?php if($index % 3 == 2 || $index == count($barcodes) - 1): ?>
                </tr>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
</body>
</html>
<?php /**PATH C:\laragon\www\sales\resources\views/producto/barcode.blade.php ENDPATH**/ ?>