<?php $__env->startSection('title', 'Apertura y cierre'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="mb-2 btn-group" role="group" aria-label="Button group">
                <?php if($caja): ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('movimientos.index')): ?>
                        <a href="<?php echo e(route('movimientos.index')); ?>" class="btn btn-primary btn-sm"
                            data-placement="left">
                            Movimientos
                        </a>
                    <?php endif; ?>
                <?php else: ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('cajas.create')): ?>
                        <a href="<?php echo e(route('cajas.create')); ?>" class="btn btn-primary btn-sm" data-placement="left">
                            Abrir Caja
                        </a>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('cajas.reportes')): ?>
                    <a href="<?php echo e(route('cajas.pdf')); ?>" target="_blank" class="btn btn-danger btn-sm">
                        <i class="fas fa-file-pdf"></i>
                    </a>
                    <a href="<?php echo e(route('cajas.excel')); ?>" class="btn btn-success btn-sm">
                        <i class="fas fa-file-excel"></i>
                    </a>
                <?php endif; ?>
            </div>

            <div class="card">
                <div class="card-body">
                    <?php if($message = Session::get('success')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e($message); ?>

                        </div>
                    <?php endif; ?>
                    <?php if($message = Session::get('error')): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo e($message); ?>

                        </div>
                    <?php endif; ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover display responsive nowrap" width="100%"
                            id="tblClients">
                            <thead class="thead">
                                <tr>
                                    <th>Id</th>
                                    <th>F. apertura</th>
                                    <th>Monto inicial</th>
                                    <th>F. cierre</th>
                                    <th>Compras</th>
                                    <th>Gastos</th>
                                    <th>Ventas</th>
                                    <th>Saldo</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link href="DataTables/datatables.min.css" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="DataTables/datatables.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            new DataTable('#tblClients', {
                responsive: true,
                fixedHeader: true,
                ajax: {
                    url: '<?php echo e(route('cajas.list')); ?>',
                    dataSrc: 'data'
                },
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'fecha_apertura'
                    },
                    {
                        data: 'monto_inicial'
                    },
                    {
                        data: 'fecha_cierre'
                    },
                    {
                        data: 'compras'
                    },
                    {
                        data: 'gastos'
                    },
                    {
                        data: 'ventas'
                    },
                    {
                        // Agregar columna para acciones
                        data: null,
                        render: function(data, type, row) {
                            // Agregar botones de editar y eliminar
                            return (parseFloat(row.monto_inicial) + parseFloat(row.ventas)) -
                                (parseFloat(row.compras) + parseFloat(row.gastos));
                        }
                    }
                ],
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/2.0.3/i18n/es-ES.json',
                },
                order: [
                    [0, 'desc']
                ],
                "createdRow": function(row, data, index) {
                    //pintar una celda
                    if (data.estado == 1) {
                        //pintar una fila
                        $('td', row).css({
                            'background-color': '#ff968f',
                            'color': 'white'
                        });
                    }
                },
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\TierraVivaCosmeticosPOS\resources\views/caja/index.blade.php ENDPATH**/ ?>