<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?php echo $__env->yieldContent('title'); ?></title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/modules/bootstrap/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/modules/fontawesome/css/all.min.css')); ?>">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/components.css')); ?>">

    <?php echo $__env->yieldContent('css'); ?>

    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body class="<?php echo e(Route::is('cotizacion.index') || Route::is('compra.index') || Route::is('venta.index') ? 'sidebar-mini' : ''); ?>">
    <div id="app">
        <div class="main-wrapper main-wrapper-1">

            <?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1><?php echo $__env->yieldContent('title'); ?></h1>
                    </div>

                    <?php echo $__env->yieldContent('content'); ?>

                </section>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; <?php echo e(date('Y')); ?> <div class="bullet"></div> Design By <a
                        href="https://nauval.in/">Muhamad
                        Nauval Azhar</a>
                </div>
                <div class="footer-right">

                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="<?php echo e(asset('assets/modules/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/modules/popper.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/modules/tooltip.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/modules/bootstrap/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/modules/nicescroll/jquery.nicescroll.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/stisla.js')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="<?php echo e(asset('assets/js/scripts.js')); ?>"></script>

    <script>
        document.getElementById('logoutButton').addEventListener('click', function() {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¿Quieres cerrar sesión?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, cerrar sesión'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Si el usuario confirma, entonces envía el formulario de logout
                    document.getElementById('logoutForm').submit();
                }
            })
        });
    </script>

    <?php echo $__env->yieldContent('js'); ?>

</body>

</html>
<?php /**PATH D:\laragon\www\TierraVivaCosmeticosPOS\resources\views/layouts/app.blade.php ENDPATH**/ ?>