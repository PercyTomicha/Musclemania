<?php $__env->startSection('content'); ?>
    <div>
        <center><h6 class="logo-name">Musclemania</h6></center>
    </div>
<div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <h3 style="color:white">Registrate para Comenzar</h3>
			<p style="color:white">Rellena todos los Campos</p>
			<form class="m-t" role="form" method="POST" action="<?php echo e(url('/register')); ?>">
                <?php echo e(csrf_field()); ?>

				<div class="form-group<?php echo e($errors->has('nombres') ? ' has-error' : ''); ?>">
					<input id="nombres" type="text" class="form-control" name="nombres" value="<?php echo e(old('nombres')); ?>" placeholder="Nombres" required autofocus>
					<?php if($errors->has('nombres')): ?>
						<span class="help-block">
							<strong><?php echo e($errors->first('nombres')); ?></strong>
						</span>
					<?php endif; ?>
				</div>
				<div class="form-group<?php echo e($errors->has('apellidos') ? ' has-error' : ''); ?>">
					<input id="apellidos" type="text" class="form-control" name="apellidos" value="<?php echo e(old('apellidos')); ?>" placeholder="Apellidos" required autofocus>
					<?php if($errors->has('apellidos')): ?>
						<span class="help-block">
							<strong><?php echo e($errors->first('apellidos')); ?></strong>
						</span>
					<?php endif; ?>
				</div>
				<div class="form-group<?php echo e($errors->has('telefono') ? ' has-error' : ''); ?>">
					<input id="telefono" type="text" class="form-control" name="telefono" value="<?php echo e(old('telefono')); ?>" placeholder="Telefono" required autofocus>
					<?php if($errors->has('telefono')): ?>
						<span class="help-block">
							<strong><?php echo e($errors->first('telefono')); ?></strong>
						</span>
					<?php endif; ?>
				</div>
				<div class="form-group<?php echo e($errors->has('fecha_nacimiento') ? ' has-error' : ''); ?>">
                    <?php echo Form::date('fecha_nacimiento',\Carbon\Carbon::now(),['class'=>'form-control','placeholder'=>'Seleccione una Fecha','required']); ?>

					<?php if($errors->has('fecha_nacimiento')): ?>
						<span class="help-block">
							<strong><?php echo e($errors->first('fecha_nacimiento')); ?></strong>
						</span>
					<?php endif; ?>
				</div>
				<div class="form-group<?php echo e($errors->has('tipo') ? ' has-error' : ''); ?>">
                    <?php echo Form::select('tipo', ['1' => 'Administrador', '2' => 'Socio', '3' => 'Instructor'], null, ['class'=>'form-control','placeholder' => 'Seleccione el Tipo de Usuario...','required']); ?>

					<?php if($errors->has('tipo')): ?>
						<span class="help-block">
							<strong><?php echo e($errors->first('tipo')); ?></strong>
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
					<div class="checkbox i-checks"><label style="color:white"> <input type="checkbox" required><i></i>Acordar los términos y la política. </label></div>
				</div>
				<button type="submit" class="btn btn-primary block full-width m-b">Registrar</button>
				<a class="btn btn-sm btn-white btn-block" href="<?php echo e(url('/login')); ?>">Iniciar Sesión</a>
			</form>
			<p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layoutAuth', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>