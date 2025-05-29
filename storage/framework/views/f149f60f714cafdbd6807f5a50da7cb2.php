<?php $__env->startSection('title', 'Creditos'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-12">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('creditoventa.reportes')): ?>
                <div class="mb-2">
                    <a href="<?php echo e(route('creditoventa.reportPdf')); ?>" class="btn btn-danger btn-sm" target="_blank">
                        <i class="fas fa-file-pdf"></i> PDF
                    </a>
                    <a href="<?php echo e(route('creditoventa.reportExcel')); ?>" class="btn btn-success btn-sm">
                        <i class="fas fa-file-excel"></i> Excel
                    </a>
                </div>
            <?php endif; ?>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover display responsive nowrap" width="100%"
                            id="tblCreditos">
                            <thead class="thead">
                                <tr>
                                    <th>Id</th>
                                    <th>Monto</th>
                                    <th>Cliente</th>
                                    <th>Abonado</th>
                                    <th>Restante</th>
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

    <div id="modalAbono" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <h3>Abono</h3>
                    </h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" id="id_credito">
                        <div class="col-md-12 mb-2">
                            <label>Cliente <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-primary"><i class="fas fa-user"></i></span>
                                </div>
                                <input id="cliente" class="form-control" type="text" placeholder="Cliente" readonly>
                            </div>
                        </div>

                        <div class="col-md-6 mb-2">
                            <label>Teléfono <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-primary"><i class="fas fa-phone"></i></span>
                                </div>
                                <input id="telefono" class="form-control" type="text" placeholder="Telefono" required>
                            </div>
                        </div>

                        <div class="col-md-6 mb-2">
                            <label>Total <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-primary"><i class="fas fa-dollar-sign"></i></span>
                                </div>
                                <input id="total" class="form-control" type="text" readonly placeholder="0.00">
                            </div>
                        </div>

                        <div class="col-md-6 mb-2">
                            <label>Abonado <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-primary"><i class="fas fa-dollar-sign"></i></span>
                                </div>
                                <input id="abonado" class="form-control" type="text" readonly placeholder="0.00">
                            </div>
                        </div>

                        <div class="col-md-6 mb-2">
                            <label>Restante <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-primary"><i class="fas fa-dollar-sign"></i></span>
                                </div>
                                <input id="restante" class="form-control" type="text" readonly placeholder="0.00">
                            </div>
                        </div>

                        <div class="col-md-6 mb-2">
                            <label>Abono <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-primary"><i class="fas fa-dollar-sign"></i></span>
                                </div>
                                <input id="monto" class="form-control" type="number" step="0.01" min="0.01"
                                    placeholder="0.00">
                            </div>
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
    <link href="<?php echo e(asset('DataTables/datatables.min.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/custom.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('DataTables/datatables.min.js')); ?>"></script>
    <script>
        var ticketUrl = "<?php echo e(route('creditoventa.ticket', ['id' => 0])); ?>";
        var abonosUrl = "<?php echo e(route('creditoventa.abonos', ['id' => 0])); ?>";
        var detalleUrl = "<?php echo e(route('creditoventa.detalle', ['id' => 0])); ?>";
        const cliente = document.querySelector('#cliente');
        const telefono = document.querySelector('#telefono');
        const total = document.querySelector('#total');
        const abonado = document.querySelector('#abonado');
        const restante = document.querySelector('#restante');
        const monto = document.querySelector('#monto');
        const forma = document.querySelector('#forma');
        const id_credito = document.querySelector('#id_credito');
        const btnProcesar = document.querySelector('#btnProcesar');
        document.addEventListener("DOMContentLoaded", function() {
            new DataTable('#tblCreditos', {
                responsive: true,
                fixedHeader: true,
                ajax: {
                    url: '<?php echo e(route('creditoventas.list')); ?>',
                    dataSrc: 'data'
                },
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'total'
                    },
                    {
                        data: 'cliente'
                    },
                    {
                        data: 'abonado'
                    },
                    {
                        data: 'restante'
                    },
                    {
                        // Agregar columna para acciones
                        data: 'fecha',
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
                            // Ocultar el botón de "Abonar" si restante es menor a 1
                            const abonarButton = row.restante >= 1 ?
                                `<a class="btn btn-sm btn-primary" onclick="abonoCredito(${row.id})" href="#">Abonar</a>` :
                                '';

                            // Agregar botones de "Abonos" y "Abonar"
                            return `<a class="btn btn-sm btn-danger" href="${abonosUrl.replace('0', row.id)}">Abonos</a>` +
                                abonarButton;
                        }
                    }
                ],
                createdRow: function(row, data, dataIndex) {
                    // Aquí puedes personalizar el estilo de la fila si es necesario
                },
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/2.0.3/i18n/es-ES.json',
                },
                order: [
                    [0, 'desc']
                ]
            });


            btnProcesar.addEventListener('click', function() {
                if (id_credito.value == '' || monto.value == '' || forma.value == '') {
                    Swal.fire({
                        position: "top-end",
                        icon: 'warning',
                        title: 'Todo los campos son requeridos',
                        showConfirmButton: false,
                        timer: 1500,
                        toast: true
                    });
                } else {
                    Swal.fire({
                        title: "Abonar",
                        text: "¿Estás seguro de abonar?",
                        icon: "info",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Si, abonar!"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch("<?php echo e(route('creditoventa.registrarAbono')); ?>", {
                                    method: 'POST',
                                    headers: {
                                        'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                                        'Content-Type': 'application/json'
                                    },
                                    body: JSON.stringify({
                                        monto: monto.value,
                                        forma: forma.value,
                                        id_credito: id_credito.value,
                                    })
                                })
                                .then(response => {
                                    return response.json();
                                })
                                .then(data => {
                                    Swal.fire({
                                        position: "top-end",
                                        icon: data.icon,
                                        title: data.title,
                                        showConfirmButton: false,
                                        timer: 1500,
                                        toast: true
                                    });
                                    if (data.icon === 'success') {
                                        // Actualizar la tabla, si es necesario
                                        $('#tblCreditos').DataTable().ajax.reload();
                                        $('#modalAbono').modal('hide');
                                        setTimeout(() => {
                                            window.open(
                                                `${ticketUrl.replace('0', data.ticket)}`,
                                                '_blank');
                                        }, 1500);
                                    }
                                })
                                .catch(error => {
                                    // Manejar otros errores
                                    console.log('Error al abonar crédito:', error);
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error',
                                        text: 'Hubo un problema al procesar el abono.'
                                    });
                                });

                        }
                    });
                }

            });

        });

        function abonoCredito(creditoId) {
            fetch(detalleUrl.replace('0', creditoId), {
                    method: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error(
                            `HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    id_credito.value = creditoId;
                    cliente.value = data.cliente.nombre;
                    telefono.value = data.cliente.telefono;
                    total.value = data.credito.total;
                    abonado.value = data.credito.abonado;
                    restante.value = data.credito.restante;
                    monto.value = data.credito.restante;
                    monto.setAttribute('max', data.credito.restante);
                    $('#modalAbono').modal('show');
                })
                .catch(error => {
                    // Manejar otros errores
                    console.log('Error al abonar crédito:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Hubo un problema'
                    });
                });

        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\TierraVivaCosmeticosPOS\resources\views/venta/creditos/index.blade.php ENDPATH**/ ?>