<?php $__env->startSection('title', 'Nueva cotización'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="mb-2">
                <a href="<?php echo e(route('cotizacion.show')); ?>" class="btn btn-primary btn-sm" data-placement="left">
                    <?php echo e(__('Listar cotizaciones')); ?>

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
                                <input id="buscarCliente" class="form-control" type="text" placeholder="Buscar Cliente">
                                <input id="id_cliente" class="form-control" type="hidden">
                            </div>
                            <span id="errorBusqueda" class="text-danger"></span>
                        </div>

                        <div class="col-md-4 mb-2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-primary"><i class="fas fa-phone"></i></span>
                                </div>
                                <input id="tel_cliente" class="form-control" placeholder="Telefono" type="text" disabled>
                            </div>
                        </div>

                        <div class="col-md-4 mb-2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-primary"><i class="fas fa-home"></i></span>
                                </div>
                                <input id="dir_cliente" class="form-control" type="text" placeholder="Direccion"
                                    disabled>
                            </div>
                        </div>
                    </div>

                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('product-cotizacion');

$__html = app('livewire')->mount($__name, $__params, 'lw-245085166-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

                    <button class="btn btn-primary fixed-button" id="btnCotizacion" type="button">Generar</button>
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
        var cotizacionUrl = "<?php echo e(route('cotizacion.index')); ?>";
        var ticketUrl = "<?php echo e(route('cotizacion.ticket', ['id' => 0])); ?>";
        const btnCotizacion = document.querySelector('#btnCotizacion');
        document.addEventListener('DOMContentLoaded', function() {
            $("#buscarCliente").autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: "<?php echo e(route('cotizacion.cliente')); ?>",
                        dataType: "json",
                        data: {
                            term: request.term
                        },
                        success: function(data) {
                            if (data.length === 0) {
                                errorBusqueda.textContent = "No se encontraron resultados.";
                            } else {
                                errorBusqueda.textContent = '';
                            }
                            response(data);
                        }
                    });
                },
                minLength: 2, // Número mínimo de caracteres para mostrar sugerencias
                select: function(event, ui) {
                    id_cliente.value = ui.item.id;
                    tel_cliente.value = ui.item.telefono,
                        dir_cliente.value = ui.item.direccion
                }
            });
            btnCotizacion.addEventListener('click', function() {
                if (id_cliente.value == '') {
                    Swal.fire({
                        title: "Respuesta",
                        text: 'El cliente es requerido',
                        icon: 'warning'
                    });
                } else {
                    Swal.fire({
                        title: "Mensaje?",
                        text: "Esta seguro de procesar la cotizacion!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Si, procesar!"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch(cotizacionUrl, {
                                    method: 'POST',
                                    headers: {
                                        'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                                        'Content-Type': 'application/json'
                                    },
                                    body: JSON.stringify({
                                        id_cliente: id_cliente.value
                                    })
                                })
                                .then(response => {
                                    return response.json();
                                })
                                .then(data => {
                                    Swal.fire({
                                        title: "Respuesta",
                                        text: data.title,
                                        icon: data.icon
                                    });
                                    if (data.icon == 'success') {
                                        setTimeout(() => {
                                            window.open(
                                                `${ticketUrl.replace('0', data.ticket)}`,
                                                '_blank');
                                            window.location.reload();
                                        }, 1500);
                                    } else {

                                    }
                                })
                                .catch(error => {
                                    // Manejar errores
                                    console.error('Error: ', error);
                                });
                        }
                    });
                }

            })
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\TierraVivaCosmeticosPOS\resources\views/cotizacion/index.blade.php ENDPATH**/ ?>