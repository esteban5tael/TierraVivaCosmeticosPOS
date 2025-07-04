<div class="row">
    <div class="col-md-7">
        <input wire:model.live="search" type="text" placeholder="Buscar productos..." class="form-control mb-2">

        <div class="row">
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-3 col-md-4 col-6">
                    <span class="product"><?php echo e($product->producto); ?></span>
                    <div class="featured-item">
                        <div class="featured-item-img">
                            <a href="#">
                                <img class="img"
                                    src="<?php echo e($product->foto ? Storage::url($product->foto) : asset('img/default.png')); ?>"
                                    alt="Images">
                            </a>
                        </div>
                        <div class="content">
                            <div class="content-in">
                                <h4>$<?php echo e($product->precio_venta); ?> </h4>
                                <span>(<?php echo e($product->stock); ?>)</span>
                            </div>
                            <hr>
                            <div class="featured-content-list">
                                <!-- **** IMPORTANT **** : Just add the class outofstock to those products, that are un-available, like in the example shown below. Remove this class when they become available again. -->
                                <button type="button" data-name="Oxford Shirts" data-price="1200"
                                    class="default-btn border-radius-5" wire:click="addToCart(<?php echo e($product->id); ?>)">
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
        </div>


        <div class="mb-2">
            <?php echo e($products->links()); ?>

        </div>

    </div>
    <div class="col-md-5">
        <!--[if BLOCK]><![endif]--><?php if($message = Session::get('success_message')): ?>
            <div class="alert alert-success">
                <?php echo e($message); ?>

            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        <!--[if BLOCK]><![endif]--><?php if($message = Session::get('error_message')): ?>
            <div class="alert alert-danger">
                <?php echo e($message); ?>

            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">Producto</th>
                        <th scope="col">Cant</th>
                        <th scope="col">Precio</th>
                        <th scope="col"></th>
                        <!-- Agrega más columnas según tus necesidades -->
                    </tr>
                </thead>
                <tbody>
                    <!--[if BLOCK]><![endif]--><?php if($cartItems->isNotEmpty()): ?>
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="align-middle">
                                    <span style="font-size: 9px;"><?php echo e($item->name); ?></span>
                                </td>
                                <td class="align-middle" width="100">
                                    <input type="number" wire:model.defer="quantity.<?php echo e($item->rowId); ?>"
                                        wire:change="updateQuantity('<?php echo e($item->rowId); ?>')" class="form-control">
                                </td>
                                <td class="align-middle">
                                    <span style="font-size: 9px;">$<?php echo e(number_format($item->price, 2)); ?></span>
                                </td>
                                <td class="align-middle"><button wire:click="removeFromCart('<?php echo e($item->rowId); ?>')"
                                        class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></td>
                                <!-- Agrega más columnas según tus necesidades -->
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">El carrito está vacío.</td>
                        </tr>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </tbody>
            </table>
        </div>
        <div>
            <input type="hidden" id="total" value="<?php echo e(Cart::subtotal()); ?>">
            <hr>
            <br>
            <h5 class="text-right">Total del Carrito: $<?php echo e(Cart::subtotal()); ?></h5>
        </div>
    </div>

</div>
<?php /**PATH D:\laragon\www\TierraVivaCosmeticosPOS\resources\views/livewire/product-list.blade.php ENDPATH**/ ?>