<?php $__env->startSection('content'); ?>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Actualización de Carrera</h2>
            <ol class="breadcrumb">
                <li><a href="/index">Inicio</a></li>
                <li class="active"><strong>Actualización de Carrera</strong></li>
            </ol>
        </div>
    </div>
    <div class="ibox-content">
        <div class="hr-line-dashed"></div>
        <?php echo Form::model($carrera, ['method' => 'PATCH','class'=>'form-horizontal','route' => ['carrera.update', $carrera->id]]); ?>

            
            <?php echo $__env->make('crud.carrera.formulario', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <?php echo Form::submit('Actualizar',['class'=>'btn btn-w-m btn-primary']); ?>

        <?php echo Form::close(); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('Script'); ?>
    <script>
        var idNivelActual=<?php echo json_encode($nivelActual); ?>;
        if(idNivelActual==3){
            $("#line").show();
            $("#cc").show();
        }else{
            $("#line").hide();
            $("#cc").hide();
        }

    </script>
    <script>
        $('#id_nivel').change(event => {
            if(event.target.value!=3){
                $("#line").hide();
                $("#cc").hide();
            }else{
                $("#line").show();
                $("#cc").show();
            }
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.principal', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>