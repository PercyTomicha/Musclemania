<?php $__env->startSection('content'); ?>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Ofertar Nueva Carrera</h2>
            <ol class="breadcrumb">
                <li><a href="/index">Inicio</a></li>
                <li class="active"><strong>Ofertar Nueva Carrera</strong></li>
            </ol>
        </div>
    </div>
    <div class="ibox-content">
        <a href="<?php echo e(route('ofertarCarrera.index')); ?>" class="btn btn-w-m btn-primary"><i class="fa fa-list-ol"></i>Listado de <strong>Carrera</strong></a>
        <div class="hr-line-dashed"></div>
        <?php echo Form::open(['route'=>['ofertarCarrera.store'],'files'=>true,'method'=>'POST','class'=>'form-horizontal']); ?>

            
            <?php echo $__env->make('crud.carreraOfertada.formulario', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <?php echo Form::submit('Registrar',['class'=>'btn btn-w-m btn-primary']); ?>

        <?php echo Form::close(); ?>

    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('Script'); ?>
    <script>
        $("#nivel").change(event => {
            var url = "<?php echo e(route('car',':ID')); ?>";
            url = url.replace(':ID',event.target.value);
            $.get(url,function (res,sta){
                $("#idCarrera").empty();
                console.log(res.id);
                res.forEach(element => {
                    $("#idCarrera").append(`<option value=${element.id}> ${element.nombre}</option>`);
                });
            });
        });
    </script>
    <script>
        $("#botonLugar").on('click', function(){
            var relacion = $("#textoModal").val();
            var url = "<?php echo e(route('setLugar',':ID')); ?>";
            url = url.replace(':ID',relacion);
            console.log(url);
            table_val=document.getElementById("tablaLugares");
            var fila="";
            $.get(url,function (res,state) {
                console.log(res);

                $("#tablaLugares").empty();
                var i=1;
                for(element in res ){
                    fila+=`<tr>
                                <td>${i}</td>
                                <td>${res[element]}</td>

                           </tr>`;
                    i++;
                }
                table_val.innerHTML=fila;

                $("#selectLugar").empty();

                for(element in res ){
                    $("#selectLugar").append(`<option value=${element}> ${res[element]}</option>`);
                    console.log(element);
                }
            })
        });

    </script>
    <script>
        $('#myModal').on('shown.bs.modal', function () {

            var url = "<?php echo e(route('showLugar')); ?>";
            table_val=document.getElementById("tablaLugares");
            var fila="";
            $.get(url,function (res,state) {
                $("#tablaLugares").empty();
                var i=1;
                for(element in res ){

                    var urlD = "<?php echo e(route('deletLugar',':ID')); ?>";
                    urlD = urlD.replace(':ID',element);

                    fila+=`<tr class="gradeX">
                                <td>${i}</td>
                                <td colspan="8">${res[element]}</td>
                                <td><a class="btn btn-w-m btn-danger" href="`+urlD+`"><i class="fa fa-trash-o"></i> Eliminar</a>
                                </td>
                           </tr>`;
                    i++;
                }
                table_val.innerHTML=fila;
            })
        });

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.principal', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>