
<?php $__env->startSection('content'); ?>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Registro de Nivel Académico</h2>
            <ol class="breadcrumb">
                <li><a href="/index">Inicio</a></li>
                <li class="active"><strong>Registro de Nivel Académico</strong></li>
            </ol>
        </div>
    </div>
    <div class="ibox-content">
        <a href="<?php echo e(route('nivel_academico.index')); ?>" class="btn btn-w-m btn-primary"><i class="fa fa-list-ol"></i>Listado de <strong>Nivel Académico</strong></a>
        <div class="hr-line-dashed"></div>
        <?php echo Form::open(['route'=>['nivel_academico.store'],'files'=>true,'method'=>'POST','class'=>'form-horizontal']); ?>


            <?php echo $__env->make('crud.nivel_academico.formulario', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <?php echo Form::submit('Registrar',['class'=>'btn btn-w-m btn-primary']); ?>

        <?php echo Form::close(); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.principal', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>