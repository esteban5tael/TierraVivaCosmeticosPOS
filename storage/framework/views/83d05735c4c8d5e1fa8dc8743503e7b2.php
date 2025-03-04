<?php $__env->startSection('title', 'Asignar rol'); ?>

<?php $__env->startSection('content'); ?>
    <div class="">
        <div class="col-md-12">

            <?php if ($__env->exists('partials.errors')) echo $__env->make('partials.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="card card-default">
                <div class="card-body">
                    <h4><?php echo e($user->name); ?></h4>
                    <hr>
                    <?php if($message = Session::get('info')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e($message); ?>

                        </div>
                    <?php endif; ?>
                    <?php echo Form::model($user, ['route' => ['rol.update', $user], 'method' => 'put']); ?>

                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div>
                            <label>
                                <?php echo Form::checkbox('roles[]', $rol->id, null, ['class' => 'mr-1']); ?>

                                <?php echo e($rol->name); ?>

                            </label>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php echo Form::submit('Asignar Rol', ['class' => 'btn btn-primary']); ?>


                    <a href="<?php echo e(route('usuarios.index')); ?>" class="btn btn-danger">Cancelar</a>

                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\sales\resources\views/usuario/rol.blade.php ENDPATH**/ ?>