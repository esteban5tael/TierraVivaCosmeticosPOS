<?php $__env->startSection('title', 'Movimientos'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body text-center">
                    <?php if(isset($error)): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo e($error); ?>

                        </div>
                        <a href="<?php echo e(route('cajas.create')); ?>" class="btn btn-primary">ABRIR CAJA</a>
                    <?php else: ?>
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <h5 class="card-title">Reporte Gráfico</h5>
                            </span>

                            <div class="float-right">
                                <form id="cerrarCajaForm" action="<?php echo e(route('cajas.update')); ?>" method="post">
                                    <?php echo e(method_field('PUT')); ?>

                                    <?php echo csrf_field(); ?>
                                    <button class="btn btn-primary" type="button" onclick="confirmarCerrarCaja()">Cerrar
                                        Caja</button>
                                </form>
                            </div>
                        </div>

                        <div style="width: 100%; height: 300px;">
                            <canvas id="myChart"></canvas>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            <?php if (! (isset($error))): ?>
                var ctx = document.getElementById('myChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Monto Inicial', 'Compras', 'Gastos', 'Ventas Contado', 'Abono ventas',
                            'Saldo'
                        ],
                        datasets: [{
                            label: 'Movimientos',
                            data: [<?php echo e($montoInicial); ?>, <?php echo e($compras); ?>, <?php echo e($gastos); ?>,
                                <?php echo e($ventas); ?>, <?php echo e($abonoventa); ?>,
                                <?php echo e($saldo); ?>

                            ],
                            backgroundColor: [
                                'rgb(255, 99, 132)',
                                'rgb(54, 162, 235)',
                                'rgb(255, 50, 50)',
                                'rgb(100, 50, 235)',
                                'rgb(100, 200, 10)',
                                'rgb(0, 200, 10)',
                            ],
                            borderColor: [
                                'rgb(255, 99, 132)',
                                'rgb(54, 162, 235)',
                                'rgb(255, 50, 50)',
                                'rgb(100, 50, 235)',
                                'rgb(100, 200, 10)',
                                'rgb(0, 200, 10)',
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        maintainAspectRatio: false,
                        legend: {
                            display: false,
                            labels: {
                                fontColor: '#585757',
                                boxWidth: 40
                            }
                        },
                        tooltips: {
                            displayColors: false
                        }

                    }
                });
            <?php endif; ?>
        });


        function confirmarCerrarCaja() {
            Swal.fire({
                title: "Cerrar Caja",
                text: "¿Estás seguro de que deseas cerrar la caja?",
                icon: "info",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, cerrar!"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('cerrarCajaForm').submit();
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\TierraVivaCosmeticosPOS\resources\views/caja/movimiento.blade.php ENDPATH**/ ?>