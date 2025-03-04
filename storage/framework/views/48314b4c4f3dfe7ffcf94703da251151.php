<?php $__env->startSection('title', 'Gastos'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-12">

            <div class="mb-2 btn-group" role="group" aria-label="Button group">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('gastos.create')): ?>
                    <a href="<?php echo e(route('gastos.create')); ?>" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i>
                    </a>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('gastos.reportes')): ?>
                    <a href="<?php echo e(route('gastos.pdf')); ?>" target="_blank" class="btn btn-danger btn-sm">
                        <i class="fas fa-file-pdf"></i>
                    </a>
                    <a href="<?php echo e(route('gastos.excel')); ?>" class="btn btn-success btn-sm">
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

                    <div class="table-responsive">
                        <table class="table table-striped table-hover display responsive nowrap" width="100%"
                            id="tblGastos">
                            <thead class="thead">
                                <tr>
                                    <th>ID</th>
                                    <th>Monto</th>
                                    <th>Usuario</th>
                                    <th>Fecha</th>
                                    <th>Descripción</th>
                                    <th>Foto</th>
                                    <th>Acciones</th>
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
        <?php echo method_field('DELETE'); ?>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link href="DataTables/datatables.min.css" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="DataTables/datatables.min.js"></script>
    <script>
        var editUrl = "<?php echo e(route('gastos.edit', ['gasto' => 0])); ?>";
        var deleteUrl = "<?php echo e(route('gastos.destroy', ['gasto' => 0])); ?>";
        document.addEventListener("DOMContentLoaded", function() {

            new DataTable('#tblGastos', {
                responsive: true,
                fixedHeader: true,
                ajax: {
                    url: '<?php echo e(route('gastos.list')); ?>',
                    dataSrc: 'data'
                },
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'monto'
                    },
                    {
                        data: 'usuario'
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
                        data: 'descripcion'
                    },
                    {
                        data: 'foto',
                        render: function(data, type, row) {
                            // Verificar si hay una ruta de imagen
                            if (data) {
                                return `<img class="img-thumbnail" src="${data}" alt="Foto">`;
                            } else {
                                return 'Sin foto';
                            }
                        }
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            return `<a class="btn btn-sm btn-primary" href="${editUrl.replace('0', row.id)}"><i class="fas fa-edit"></i></a>` +
                                '<button class="btn btn-sm btn-danger" onclick="deleteGasto(' +
                                row.id + ')"><i class="fas fa-trash"></i></button>';
                        }
                    }
                ],
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/2.0.3/i18n/es-ES.json',
                },
                order: [
                    [0, 'desc']
                ]
            });
        });


        // Función para eliminar un gasto
        function deleteGasto(gastoId) {
            Swal.fire({
                title: "Eliminar",
                text: "¿Estás seguro de que quieres eliminar este gasto?",
                icon: "info",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, eliminar!"
            }).then((result) => {
                if (result.isConfirmed) {
                    var form = document.querySelector('#deleteForm');
                    form.action = deleteUrl.replace('0', gastoId);
                    // Enviar el formulario
                    form.submit();
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\sales\resources\views/gastos/index.blade.php ENDPATH**/ ?>