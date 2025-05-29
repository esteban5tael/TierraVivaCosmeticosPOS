<?php $__env->startSection('title', 'Nueva venta'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="mb-1">
                <a href="<?php echo e(route('cajas.index')); ?>" class="btn btn-info btn-sm">
                    <i class="fas fa-funnel-dollar"></i> <?php echo e(__('Caja')); ?>

                </a>
                <a href="<?php echo e(route('venta.show')); ?>" class="btn btn-primary btn-sm">
                    <i class="fas fa-list"></i> <?php echo e(__('Listar ventas')); ?>

                </a>
            </div>
            <div class="card">
                <div class="card-body">

                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('product-list');

$__html = app('livewire')->mount($__name, $__params, 'lw-402620084-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                    
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary fixed-button" id="btnVenta" type="button">Generar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="modalVenta">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <h3>Total: <span id="total_pagar">0.00</span></h3>
                    </h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label>Buscar Cliente <span class="text-danger">*</span></label>
                    <div class="row">
                        <div class="col-md-8 mb-2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-primary"><i class="fas fa-search"></i></span>
                                </div>
                                <input id="buscarCliente" class="form-control" type="text"
                                    placeholder="Nombre del cliente">
                                <input id="id_cliente" class="form-control" type="hidden">
                            </div>
                            <span id="errorBusqueda" class="text-danger"></span>
                        </div>

                        <div class="col-md-4 mb-2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-primary"><i class="fas fa-dollar-sign"></i></span>
                                </div>
                                <input id="limitecredito" class="form-control" type="text" placeholder="Lim. Credito"
                                    disabled>
                            </div>
                        </div>

                        <div class="col-md-6 mb-2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-primary"><i class="fas fa-phone"></i></span>
                                </div>
                                <input id="tel_cliente" class="form-control" placeholder="Telefono" type="text" disabled>
                            </div>
                        </div>

                        <div class="col-md-6 mb-2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-primary"><i class="fas fa-home"></i></span>
                                </div>
                                <input id="dir_cliente" class="form-control" type="text" placeholder="Direccion"
                                    disabled>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <hr>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="forma">Forma Pago <span class="text-danger">*</span></label>
                            <select id="forma" class="form-control">
                                <option value="">Seleccionar</option>
                                <?php $__currentLoopData = $formapagos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $formapago): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($formapago->id); ?>"><?php echo e($formapago->nombre); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="metodo">Metodo <span class="text-danger">*</span></label>
                            <select id="metodo" class="form-control">
                                <option value="Contado">Contado</option>
                                <option value="Credito">Credito</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="pago_con">Pago con</label>
                            <input id="pago_con" class="form-control" type="number" step="0.01" min="0.01"
                                placeholder="0.00" oninput="calcularCambio()">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="cambio">Cambio</label>
                            <input id="cambio" class="form-control" type="text" placeholder="0.00" disabled>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-primary" id="btnProcesar" type="button">Completar</button>
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
        
        var ventaUrl = "<?php echo e(route('venta.index')); ?>";
        var ticketUrl = "<?php echo e(route('venta.ticket', ['id' => 0])); ?>";
        var limiteUrl = "<?php echo e(route('creditoventa.limitecliente', ['id' => 0])); ?>";
        const btnVenta = document.querySelector('#btnVenta');
        const btnProcesar = document.querySelector('#btnProcesar');
        const total_pagar = document.querySelector('#total_pagar');
        const metodo = document.querySelector('#metodo');
        const pago_con = document.querySelector('#pago_con');
        const total = document.querySelector('#total');
        const limitecredito = document.querySelector('#limitecredito');
        document.addEventListener('DOMContentLoaded', function() {

            $("#buscarCliente").autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: "<?php echo e(route('venta.cliente')); ?>",
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
                    console.log(ui.item.id);
                    id_cliente.value = ui.item.id;
                    tel_cliente.value = ui.item.telefono;
                    dir_cliente.value = ui.item.direccion;
                    verlimitecredito(ui.item.id);
                }
            });

            btnVenta.addEventListener('click', function() {
                total_pagar.textContent = total.value;
                $('#modalVenta').modal('show');
            })

            btnProcesar.addEventListener('click', function() {
                if (id_cliente.value == '' || forma.value == '' || metodo.value == '') {
                    mostrarAlerta('TODO LOS CAMPOS CON * SON REQUERIDOS', 'warning');
                } else {
                    const montoPago = parseFloat(pago_con.value.replace(',', ''));
                    const totalPagar = parseFloat(total_pagar.textContent.replace(',', ''));

                    const esCredito = metodo.value === 'Credito';

                    if (esCredito && parseFloat(limitecredito.value) < totalPagar) {
                        mostrarAlerta("TU LIMITE DE CREDITO SUPERA AL TOTAL", 'warning');
                        return;
                    }

                    if (esCredito && montoPago >= totalPagar) {
                        mostrarAlerta("LA VENTA ES A CREDITO, INGRESE UN VALOR MENOR AL TOTAL", 'warning');
                        return;
                    }

                    Swal.fire({
                        title: "Mensaje?",
                        text: "Esta seguro de procesar la venta!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Si, procesar!"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch(ventaUrl, {
                                    method: 'POST',
                                    headers: {
                                        'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                                        'Content-Type': 'application/json'
                                    },
                                    body: JSON.stringify({
                                        id_cliente: id_cliente.value,
                                        forma: forma.value,
                                        metodo: metodo.value,
                                        pago_con: montoPago,
                                    })
                                })
                                .then(response => response.json())
                                .then(data => {
                                    mostrarAlerta(data.title, data.icon);
                                    if (data.icon == 'success') {
                                        setTimeout(() => {
                                            window.open(
                                                `${ticketUrl.replace('0', data.ticket)}`,
                                                '_blank');
                                            window.location.reload();
                                        }, 1500);
                                    }
                                })
                                .catch(error => {
                                    console.error('Error: ', error);
                                });
                        }
                    });
                }
            });

        })

        function verlimitecredito(id_cliente) {
            fetch(limiteUrl.replace('0', id_cliente), {
                    method: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    limitecredito.value = data.toFixed(2);
                })
                .catch(error => {
                    console.error('Error: ', error);
                });
        }

        function calcularCambio() {
            var pagoCon = parseFloat(pago_con.value.replace(',', '')) || 0; // Reemplaza comas por puntos
            var totalVenta = parseFloat(total.value.replace(',', '')) || 0;

            if (!isNaN(pagoCon) && !isNaN(totalVenta)) {
                var cambio = pagoCon - totalVenta;
                document.getElementById('cambio').value = cambio.toFixed(2);
            } else {
                document.getElementById('cambio').value = '0.00';
            }
        }

        function mostrarAlerta(texto, icono) {
            Swal.fire({
                showConfirmButton: false,
                title: "Respuesta",
                text: texto,
                icon: icono,
                toast: true,
                timer: 1500,
                position: "top-end",
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\TierraVivaCosmeticosPOS\resources\views/venta/index.blade.php ENDPATH**/ ?>