<?php $__env->startSection('title', 'Proveedores'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="mb-2 btn-group" role="group" aria-label="Button group">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('proveedores.create')): ?>
                    <a href="<?php echo e(route('proveedores.create')); ?>" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i>
                    </a>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('proveedores.reportes')): ?>
                    <a href="<?php echo e(route('proveedores.pdf')); ?>" target="_blank" class="btn btn-danger btn-sm">
                        <i class="fas fa-file-pdf"></i>
                    </a>
                    <a href="<?php echo e(route('proveedores.excel')); ?>" class="btn btn-success btn-sm">
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
                            id="tblProveedors">
                            <thead class="thead">
                                <tr>
                                    <th>Id</th>
                                    <th>N° Iden. Fiscal</th>
                                    <th>Nombre</th>
                                    <th>Teléfono</th>
                                    <th>Correo</th>
                                    <th>Dirección</th>
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
        <?php echo method_field('DELETE'); ?>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link href="DataTables/datatables.min.css" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="DataTables/datatables.min.js"></script>
    <script>
        var editUrl = "<?php echo e(route('proveedores.edit', ['proveedore' => 0])); ?>";
        var deleteUrl = "<?php echo e(route('proveedores.destroy', ['proveedore' => 0])); ?>";
        document.addEventListener("DOMContentLoaded", function() {
            new DataTable('#tblProveedors', {
                responsive: true,
                fixedHeader: true,
                ajax: {
                    url: '<?php echo e(route('proveedors.list')); ?>',
                    dataSrc: 'data'
                },
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'identidad'
                    },
                    {
                        data: 'nombre'
                    },
                    {
                        data: 'telefono'
                    },
                    {
                        data: 'correo'
                    },
                    {
                        data: 'direccion'
                    },
                    {
                        // Agregar columna para acciones
                        data: null,
                        render: function(data, type, row) {
                            // Agregar botones de editar y eliminar
                            return `<a class="btn btn-sm btn-primary" href="${editUrl.replace('0', row.id)}"><i class="fas fa-edit"></i></a>` +
                                '<button class="btn btn-sm btn-danger" onclick="deleteProveedor(' +
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

        // Función para eliminar un proveedor
        function deleteProveedor(proveedorId) {
            Swal.fire({
                title: "Eliminar",
                text: "¿Estás seguro de que quieres eliminar este proveedor?",
                icon: "info",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, eliminar!"
            }).then((result) => {
                if (result.isConfirmed) {
                    var form = document.querySelector('#deleteForm');
                    form.action = deleteUrl.replace('0', proveedorId);
                    // Enviar el formulario
                    form.submit();
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\sales\resources\views/proveedor/index.blade.php ENDPATH**/ ?>