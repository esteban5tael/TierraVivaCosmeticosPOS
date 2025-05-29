<?php $__env->startSection('title', 'Productos'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="mb-2 btn-group" role="group" aria-label="Button group">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('productos.create')): ?>
                    <a href="<?php echo e(route('productos.create')); ?>" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i>
                    </a>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('productos.reportes')): ?>
                    <a href="<?php echo e(route('productos.pdf')); ?>" target="_blank" class="btn btn-danger btn-sm">
                        <i class="fas fa-file-pdf"></i>
                    </a>
                    <a href="<?php echo e(route('productos.excel')); ?>" class="btn btn-success btn-sm">
                        <i class="fas fa-file-excel"></i>
                    </a>
                    <a href="<?php echo e(route('productos.barcode')); ?>" target="_blank" class="btn btn-secondary btn-sm">
                        <i class="fas fa-barcode"></i>
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
                            id="tblProducts">
                            <thead class="thead">
                                <tr>
                                    <th>Id</th>
                                    <th>Codigo</th>
                                    <th>Producto</th>
                                    <th>P. compra</th>
                                    <th>P. venta</th>
                                    <th>Stock</th>
                                    <th>Categoria</th>
                                    <th></th>
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
        var editUrl = "<?php echo e(route('productos.edit', ['producto' => 0])); ?>";
        var deleteUrl = "<?php echo e(route('productos.destroy', ['producto' => 0])); ?>";
        document.addEventListener("DOMContentLoaded", function() {
            new DataTable('#tblProducts', {
                responsive: true,
                fixedHeader: true,
                dom: 'Pfrtip', // Agrega los elementos necesarios para SearchPane
                searchPanes: {
                    columns: [6]
                },
                ajax: {
                    url: '<?php echo e(route('products.list')); ?>',
                    dataSrc: 'data'
                },
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'codigo'
                    },
                    {
                        data: 'producto'
                    },
                    {
                        data: 'precio_compra'
                    },
                    {
                        data: 'precio_venta'
                    },
                    {
                        data: 'stock'
                    },
                    {
                        data: 'categoria'
                    },
                    {
                        data: 'foto',
                        render: function(data, type, row) {
                            return data ? '<img src="storage/' + data +
                                '" alt="Imagen del Producto" style="max-width: 100px; max-height: 100px;">' :
                                'Sin imagen';
                        }
                    },
                    {
                        // Agregar columna para acciones
                        data: null,
                        render: function(data, type, row) {
                            // Agregar botones de editar y eliminar
                            return `<a class="btn btn-sm btn-primary" href="${editUrl.replace('0', row.id)}"><i class="fas fa-edit"></i></a>` +
                                '<button class="btn btn-sm btn-danger" onclick="deleteProduct(' +
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

        // Función para eliminar un producto
        function deleteProduct(productId) {
            Swal.fire({
                title: "Eliminar",
                text: "¿Estás seguro de que quieres eliminar este producto?",
                icon: "info",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, eliminar!"
            }).then((result) => {
                if (result.isConfirmed) {
                    var form = document.querySelector('#deleteForm');
                    form.action = deleteUrl.replace('0', productId);
                    // Enviar el formulario
                    form.submit();
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\TierraVivaCosmeticosPOS\resources\views/producto/index.blade.php ENDPATH**/ ?>