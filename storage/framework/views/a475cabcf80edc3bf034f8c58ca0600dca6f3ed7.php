<?php $__env->startSection('content'); ?>
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
                <h1 class="logo-name">ICAP</h1>
            </div>
            <h3>Bienvenidos</h3>
            <p>La educacion es el pasaporte hacia el futuro, el mañana pertenece a aquellos que se preparan para el en el dia de hoy. Malcolm X
                <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
            </p>
            <p>Inicia Sesion para seguir trabajando</p>
            <form class="m-t" role="form" method="POST" action="<?php echo e(url('/login')); ?>">
                <?php echo e(csrf_field()); ?>

                <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                    <input id="email" type="email" class="form-control" name="email" placeholder="Código" value="<?php echo e(old('email')); ?>" required autofocus>
                    <?php if($errors->has('email')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('email')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
                <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                    <input id="password" type="password" class="form-control" name="password" placeholder="Contraseña" value="<?php echo e(old('password')); ?>" required autofocus>
                    <?php if($errors->has('password')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('password')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Iniciar Sesión</button>
                <a class="btn btn-link" href="<?php echo e(url('/password/reset')); ?>"><small>¿Olvidaste tu Contraseña?</small></a>
                <!--
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                -->
                <!--<a class="btn btn-sm btn-white btn-block" href="<?php echo e(url('/register')); ?>">Crea una Cuenta</a>-->
            </form>
            <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layoutAuth', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>