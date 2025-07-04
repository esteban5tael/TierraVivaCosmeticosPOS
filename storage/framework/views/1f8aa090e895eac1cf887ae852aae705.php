<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>
    </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="<?php echo e(asset('assets/img/avatar/avatar-1.png')); ?>" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hola, <?php echo e(Auth::user()->name); ?></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="<?php echo e(route('profile.edit')); ?>" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Perfil
                </a>
                <div class="dropdown-divider"></div>
                <a id="logoutButton" href="#" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Salir
                </a>
                <form id="logoutForm" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                    <?php echo csrf_field(); ?>
                </form>
            </div>
        </li>
    </ul>
</nav>
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="<?php echo e(route('dashboard')); ?>">POS</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?php echo e(route('dashboard')); ?>">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown <?php echo e(Route::is('dashboard') ? 'active' : ''); ?>">
                <a href="<?php echo e(route('dashboard')); ?>" class="nav-link"><i
                        class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['usuarios.index', 'formas-pago.index', 'compania.update'])): ?>
                <li
                    class="dropdown <?php echo e(Route::is('usuarios.index') || Route::is('formas.index') || Route::is('compania.index') ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-cogs"></i>
                        <span>Administración</span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('usuarios.index')): ?>
                            <li><a class="nav-link" href="<?php echo e(route('usuarios.index')); ?>">Usuarios</a></li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('formas-pago.index')): ?>
                            <li><a class="nav-link" href="<?php echo e(route('formas.index')); ?>">Forma pagos</a></li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('compania.update')): ?>
                            <li><a class="nav-link" href="<?php echo e(route('compania.index')); ?>">Compania</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>


            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('clientes.index')): ?>
                <li class="<?php echo e(Route::is('clientes.index') ? 'active' : ''); ?>"><a class="nav-link"
                        href="<?php echo e(route('clientes.index')); ?>"><i class="fas fa-users"></i>
                        <span>Clientes</span></a>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('proveedores.index')): ?>
                <li class="<?php echo e(Route::is('proveedores.index') ? 'active' : ''); ?>"><a class="nav-link"
                        href="<?php echo e(route('proveedores.index')); ?>"><i class="fas fa-truck"></i>
                        <span>Proveedores</span></a>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['cajas.index', 'movimientos.index', 'gastos.index'])): ?>
                <li
                    class="dropdown <?php echo e(Route::is('cajas.index') || Route::is('gastos.index') || Route::is('movimientos.index') ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-credit-card"></i>
                        <span>Cajas</span></a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('cajas.index')): ?>
                            <li><a class="nav-link" href="<?php echo e(route('cajas.index')); ?>">Apertura y Cierre</a></li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('gastos.index')): ?>
                            <li><a class="nav-link" href="<?php echo e(route('gastos.index')); ?>">Gastos</a></li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('movimientos.index')): ?>
                            <li><a class="nav-link" href="<?php echo e(route('movimientos.index')); ?>">Movimientos</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>


            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['categorias.index', 'productos.index'])): ?>
                <li class="dropdown <?php echo e(Route::is('categorias.index') || Route::is('productos.index') ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i>
                        <span>Artículos</span></a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('categorias.index')): ?>
                            <li><a class="nav-link" href="<?php echo e(route('categorias.index')); ?>">Categorías</a></li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('productos.index')): ?>
                            <li><a class="nav-link" href="<?php echo e(route('productos.index')); ?>">Productos</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['venta.index', 'venta.show', 'creditoventa.index'])): ?>
                <li
                    class="dropdown <?php echo e(Route::is('venta.index') || Route::is('venta.show') || Route::is('creditoventa.index') ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i>
                        <span>Ventas</span></a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('venta.index')): ?>
                            <li><a class="nav-link" href="<?php echo e(route('venta.index')); ?>">Nueva venta</a></li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('venta.show')): ?>
                            <li><a class="nav-link" href="<?php echo e(route('venta.show')); ?>">Listar ventas</a></li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('creditoventa.index')): ?>
                            <li><a class="nav-link" href="<?php echo e(route('creditoventa.index')); ?>">Administrar Créditos</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['cotizacion.index', 'cotizacion.show'])): ?>
                <li class="dropdown <?php echo e(Route::is('cotizacion.index') || Route::is('cotizacion.show') ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-list"></i>
                        <span>Cotizaciones</span></a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('cotizacion.index')): ?>
                            <li><a href="<?php echo e(route('cotizacion.index')); ?>">Nueva cotización</a></li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('cotizacion.show')): ?>
                            <li><a href="<?php echo e(route('cotizacion.show')); ?>">Listar cotizaciones</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['compra.index', 'compra.show'])): ?>
                <li class="dropdown <?php echo e(Route::is('compra.index') || Route::is('compra.show') ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-shopping-cart"></i>
                        <span>Compras</span></a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('compra.index')): ?>
                            <li><a class="nav-link" href="<?php echo e(route('compra.index')); ?>">Nueva compra</a></li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('compra.show')): ?>
                            <li><a class="nav-link" href="<?php echo e(route('compra.show')); ?>">Listar compras</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

        </ul>

    </aside>
</div>
<?php /**PATH D:\laragon\www\TierraVivaCosmeticosPOS\resources\views/layouts/menu.blade.php ENDPATH**/ ?>