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
            <p>Folio: <?php echo e($abono->id); ?></p>
            <p>Credito N°: <?php echo e($abono->creditoventa->id); ?></p>
            <p>Fecha/Hora: <?php echo e($abono->creditoventa->created_at); ?></p>
        
            ==================================
            <p>Cliente: <?php echo e($abono->creditoventa->venta->cliente->nombre); ?></p>
            <p>Teléfono: <?php echo e($abono->creditoventa->venta->cliente->telefono); ?></p>
            <p>Dirección: <?php echo e($abono->creditoventa->venta->cliente->direccion); ?></p>
            ==================================
            <p>abono: <?php echo e($abono->monto); ?></p>
            <p>Fecha: <?php echo e($abono->created_at); ?></p>
            <p>Forma Pago: <?php echo e($abono->formapago->nombre); ?></p>
            <h5>Abonado: <?php echo e(number_format($abonado, 2)); ?></h5>
            <h5>Restante: <?php echo e(number_format($abono->creditoventa->venta->total - $abonado, 2)); ?></h5>
            <h5>Total: <?php echo e(number_format($abono->creditoventa->venta->total, 2)); ?></h5>
        </div>
    </div>
</body>

</html>
<?php
    header('Content-type: application/pdf');
?>
<?php /**PATH C:\laragon\www\sales\resources\views/venta/creditos/ticket.blade.php ENDPATH**/ ?>