

<?php $__env->startSection('title', 'Historial cotización'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-12">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('cotizacion.reportes')): ?>
                <div class="mb-2 btn-group" role="group" aria-label="Button group">

                    <a href="<?php echo e(route('cotizaciones.pdf')); ?>" target="_blank" class="btn btn-danger btn-sm">
                        <i class="fas fa-file-pdf"></i>
                    </a>
                    <a href="<?php echo e(route('cotizaciones.excel')); ?>" class="btn btn-success btn-sm">
                        <i class="fas fa-file-excel"></i>
                    </a>

                </div>
            <?php endif; ?>
            <div class="card">
                <div class="card-body">
                    <?php if($message = Session::get('success')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e($message); ?>

                        </div>
                    <?php endif; ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover display responsive nowrap" width="100%"
                            id="tblCotizacions">
                            <thead class="thead">
                                <tr>
                                    <th>Id</th>
                                    <th>Monto</th>
                                    <th>Cliente</th>
                                    <th>Fecha/Hora</th>
                                    <th></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form id="deleteForm" action="#" method="post">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(asset('DataTables/datatables.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('DataTables/datatables.min.js')); ?>"></script>
    <script>
        var ticketUrl = "<?php echo e(route('cotizacion.ticket', ['id' => 0])); ?>";
        var anularUrl = "<?php echo e(route('cotizacion.eliminar', ['id' => 0])); ?>";
        document.addEventListener("DOMContentLoaded", function() {
            new DataTable('#tblCotizacions', {
                responsive: true,
                fixedHeader: true,
                ajax: {
                    url: '<?php echo e(route('cotizaciones.list')); ?>',
                    dataSrc: 'data'
                },
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'total'
                    },
                    {
                        data: 'nombre'
                    },
                    {
                        // Agregar columna para acciones
                        data: 'created_at',
                        render: function(data, type, row, meta) {
                            if (type === 'display') {
                                // Formatear la fecha en el formato deseado
                                return new Date(data).toLocaleString();
                            }
                            return data;
                        }
                    },
                    {
                        // Agregar columna para acciones
                        data: null,
                        render: function(data, type, row) {
                            // Agregar botones de editar y eliminar
                            return `<a class="btn btn-sm btn-danger" target="_blank" href="${ticketUrl.replace('0', row.id)}">Ticket</a>` +
                                `<a class="btn btn-sm btn-warning" onclick="anularCotizacion(${row.id})" href="#">Eliminar</a>`;
                        }

                    }
                ],
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
                },
                order: [
                    [0, 'desc']
                ]
            });
        });

        function anularCotizacion(cotizacionId) {
            Swal.fire({
                title: "Anular",
                text: "¿Estás seguro de eliminar la cotizacion?",
                icon: "info",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, eliminar!"
            }).then((result) => {
                if (result.isConfirmed) {
                    var form = document.querySelector('#deleteForm');
                    form.action = anularUrl.replace('0', cotizacionId);
                    // Enviar el formulario
                    form.submit();
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\sales\resources\views/cotizacion/show.blade.php ENDPATH**/ ?>