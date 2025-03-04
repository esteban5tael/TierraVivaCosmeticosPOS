<?php $__env->startSection('title', 'Nueva compra'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="mb-2">
                <a href="<?php echo e(route('cajas.index')); ?>" class="btn btn-info btn-sm">
                    <i class="fas fa-funnel-dollar"></i> <?php echo e(__('Caja')); ?>

                </a>
                <a href="<?php echo e(route('compra.show')); ?>" class="btn btn-primary btn-sm">
                    <i class="fas fa-list"></i> <?php echo e(__('Listar compras')); ?>

                </a>
            </div>
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-4 mb-2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-primary"><i class="fas fa-search"></i></span>
                                </div>
                                <input id="buscarProveedor" class="form-control" type="text"
                                    placeholder="Buscar Proveedor">
                                <input id="id_proveedor" class="form-control" type="hidden">
                            </div>
                            <span id="errorBusqueda" class="text-danger"></span>
                        </div>

                        <div class="col-md-4 mb-2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-primary"><i class="fas fa-phone"></i></span>
                                </div>
                                <input id="tel_proveedor" class="form-control" placeholder="Telefono" type="text"
                                    disabled>
                            </div>
                        </div>

                        <div class="col-md-4 mb-2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-primary"><i class="fas fa-home"></i></span>
                                </div>
                                <input id="dir_proveedor" class="form-control" type="text" placeholder="Direccion"
                                    disabled>
                            </div>
                        </div>
                    </div>

                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('product-compra');

$__html = app('livewire')->mount($__name, $__params, 'lw-907372482-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

                    <button class="btn btn-primary fixed-button" id="btnCompra" type="button">Generar</button>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/custom.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
    <script>
        var compraUrl = "<?php echo e(route('compra.index')); ?>";
        var ticketUrl = "<?php echo e(route('compra.ticket', ['id' => 0])); ?>";

        const btnCompra = document.querySelector('#btnCompra');

        document.addEventListener('DOMContentLoaded', function() {
            $("#buscarProveedor").autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: "<?php echo e(route('compra.proveedor')); ?>",
                        dataType: "json",
                        data: {
                            term: request.term
                        },
                        success: function(data) {
                            if (data.length === 0) {
                                errorBusqueda.textContent =
                                    "No se encontraron resultados.";
                            } else {
                                errorBusqueda.textContent = '';
                            }
                            response(data);
                        }
                    });
                },
                minLength: 2, // Número mínimo de caracteres para mostrar sugerencias
                select: function(event, ui) {
                    id_proveedor.value = ui.item.id;
                    tel_proveedor.value = ui.item.telefono,
                        dir_proveedor.value = ui.item.direccion
                }
            });
            btnCompra.addEventListener('click', function() {
                if (id_proveedor.value == '') {
                    Swal.fire({
                        title: "Respuesta",
                        text: 'El proveedor es requerido',
                        icon: 'warning'
                    });
                } else {
                    Swal.fire({
                        title: "Mensaje?",
                        text: "Esta seguro de procesar la compra!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Si, procesar!"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch(compraUrl, {
                                    method: 'POST',
                                    headers: {
                                        'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                                        'Content-Type': 'application/json'
                                    },
                                    body: JSON.stringify({
                                        id_proveedor: id_proveedor.value
                                    })
                                })
                                .then(response => {
                                    if (!response.ok) {
                                        throw new Error(
                                            `La solicitud falló con estado: ${response.status}`
                                        );
                                    }
                                    return response.json();
                                })
                                .then(data => {
                                    Swal.fire({
                                        title: "Respuesta",
                                        text: data.title,
                                        icon: data.icon
                                    });

                                    if (data.icon === 'success') {
                                        setTimeout(() => {
                                            window.open(
                                                `${ticketUrl.replace('0', data.ticket)}`,
                                                '_blank');
                                            window.location.href =
                                                compraUrl; // Puedes cambiar esto según tus necesidades
                                        }, 1500);
                                    } else {
                                        // Manejar otros casos si es necesario
                                    }
                                })
                                .catch(error => {
                                    console.error('Error en la solicitud:', error);
                                    Swal.fire({
                                        title: "Error",
                                        text: "Hubo un problema al procesar la solicitud.",
                                        icon: "error"
                                    });
                                });

                        }
                    });
                }

            })
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\sales\resources\views/compra/index.blade.php ENDPATH**/ ?>