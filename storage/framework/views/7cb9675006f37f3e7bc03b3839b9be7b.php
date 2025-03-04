<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Clientes</h4>
                    </div>
                    <div class="card-body">
                        <?php echo e($totales['clients']); ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Productos</h4>
                    </div>
                    <div class="card-body">
                        <?php echo e($totales['products']); ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Compras</h4>
                    </div>
                    <div class="card-body">
                        <?php echo e(number_format($montosTotal['compras'], 2)); ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-circle"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Ventas</h4>
                    </div>
                    <div class="card-body">
                        <?php echo e(number_format($montosTotal['ventas'], 2)); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <?php if($ventasPorSemana || $comprasPorSemana): ?>
            <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Compras y Ventas por Semana</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="ventasPorSemana" width="804" height="375" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if($ventas || $compras): ?>
            <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Compras y Ventas por Mes</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="ventasPorMes" width="804" height="375" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="col-md-12">
            <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Highcharts.chart('container', {
                chart: {
                    type: 'bar'
                },
                title: {
                    text: 'Productos con Stock Bajo'
                },
                xAxis: {
                    categories: <?php echo json_encode($productos->pluck('producto')); ?>

                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Stock'
                    }
                },
                legend: {
                    reversed: true
                },
                plotOptions: {
                    series: {
                        stacking: 'normal'
                    }
                },
                series: [{
                    name: 'Stock',
                    data: <?php echo json_encode($productos->pluck('stock')); ?>

                }]
            });

            if (document.getElementById('ventasPorSemana')) {
                ventasSemana()
            }

            //ventas
            var dataVenta = <?php echo json_encode($ventas, 15, 512) ?>;
            var dataCompra = <?php echo json_encode($compras, 15, 512) ?>;

            // Verifica si hay datos de ventas o compras
            var hayDatosVenta = dataVenta && Object.keys(dataVenta).length > 0;
            var hayDatosCompra = dataCompra && Object.keys(dataCompra).length > 0;

            if (hayDatosVenta || hayDatosCompra) {
                var ctx = document.getElementById('ventasPorMes').getContext('2d');
                var datasets = [];

                // Sales data
                if (hayDatosVenta) {
                    Object.keys(dataVenta).forEach(function(year, index) {
                        datasets.push({
                            label: 'Ventas ' + year,
                            data: Object.values(dataVenta[year]),
                            backgroundColor: 'rgb(99, 237, 122)',
                            borderWidth: 1
                        });
                    });
                }

                // Purchases data
                if (hayDatosCompra) {
                    Object.keys(dataCompra).forEach(function(year, index) {
                        datasets.push({
                            label: 'Compras ' + year,
                            data: Object.values(dataCompra[year]),
                            backgroundColor: 'rgb(103, 119, 239)',
                            borderWidth: 1
                        });
                    });
                }

                var labels = hayDatosVenta ? Object.keys(dataVenta[Object.keys(dataVenta)[0]]) : (hayDatosCompra ?
                    Object.keys(
                        dataCompra[Object.keys(dataCompra)[0]]) : []);

                var chart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: datasets
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            } else {
                // Si no hay datos, puedes realizar alguna acción de manejo de error o simplemente mostrar un mensaje
                console.log('No hay datos disponibles para mostrar el gráfico.');
            }
        });

        function ventasSemana() {
            var ctx = document.getElementById('ventasPorSemana').getContext('2d');

            var ventasData = <?php echo json_encode($ventasPorSemana); ?>;
            var comprasData = <?php echo json_encode($comprasPorSemana); ?>;

            var labels = ventasData.map(function(item) {
                return item.diaEnEspanol;
            });

            var ventasValores = ventasData.map(function(item) {
                return item.total;
            });

            var comprasValores = comprasData.map(function(item) {
                return item.total;
            });

            var chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                            label: 'Ventas por semana',
                            data: ventasValores,
                            backgroundColor: 'rgb(99, 237, 122)',
                            borderColor: 'rgb(99, 237, 122)',
                            borderWidth: 1
                        },
                        {
                            label: 'Compras por semana',
                            data: comprasValores,
                            backgroundColor: 'rgb(103, 119, 239)',
                            borderColor: 'rgb(103, 119, 239)',
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\sales\resources\views/dashboard.blade.php ENDPATH**/ ?>