<?php $__env->startSection('content'); ?>
<div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
                <h1 class="logo-name">ICAP</h1>
            </div>
            <h3>Registrate para comenzar</h3>
			<p>Rellena todos los campos</p>
			<form class="m-t" role="form" method="POST" action="<?php echo e(url('/register')); ?>">
                <?php echo e(csrf_field()); ?>

				<div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
					<input id="name" type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" placeholder="Nombre" required autofocus>
					<?php if($errors->has('name')): ?>
						<span class="help-block">
							<strong><?php echo e($errors->first('name')); ?></strong>
						</span>
					<?php endif; ?>
				</div>
				<div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
					<input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" placeholder="Correo Electrónico" required autofocus>
					<?php if($errors->has('email')): ?>
						<span class="help-block">
							<strong><?php echo e($errors->first('email')); ?></strong>
						</span>
					<?php endif; ?>
				</div>
				<div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
					<input id="password" type="password" class="form-control" name="password" placeholder="Contraseña" required>
					<?php if($errors->has('password')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('password')); ?></strong>
                        </span>
                    <?php endif; ?>
				</div>
				<div class="form-group">
					<input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmar Contraseña" required>
				</div>
				            
				<div class="form-group">
					<div class="checkbox i-checks"><label> <input type="checkbox" required><i></i> Agree the terms and policy </label></div>
				</div>
				<button type="submit" class="btn btn-primary block full-width m-b">Registrar</button>
				<a class="btn btn-sm btn-white btn-block" href="<?php echo e(url('/login')); ?>">Iniciar Sesión</a>
			</form>
			<p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layoutAuth', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>