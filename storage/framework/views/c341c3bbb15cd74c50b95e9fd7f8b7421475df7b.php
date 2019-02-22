<?php $__env->startSection('content'); ?>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Actualización de Usuario</h2>
            <ol class="breadcrumb">
                <li><a href="/index">Inicio</a></li>
                <li class="active"><strong>Actualización de Usuario</strong></li>
            </ol>
        </div>
    </div>
    <div class="ibox-content">
        <div class="hr-line-dashed"></div>
        <?php echo Form::model($usuario, ['method' => 'PATCH','class'=>'form-horizontal','route' => ['usuario.update', $usuario->id]]); ?>


            <?php echo $__env->make('crud.usuario.form', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <?php echo Form::submit('Actualizar',['class'=>'btn btn-w-m btn-primary']); ?>

        <?php echo Form::close(); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.principal', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>