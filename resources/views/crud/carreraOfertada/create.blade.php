@extends('layouts.principal')
@section('content')
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
        <a href="{{route('ofertarCarrera.index')}}" class="btn btn-w-m btn-primary"><i class="fa fa-list-ol"></i>Listado de <strong>Carrera</strong></a>
        <div class="hr-line-dashed"></div>
        {!!Form::open(['route'=>['ofertarCarrera.store'],'files'=>true,'method'=>'POST','class'=>'form-horizontal'])!!}
            
            @include('crud.carreraOfertada.formulario')

            {!!Form::submit('Registrar',['class'=>'btn btn-w-m btn-primary'])!!}
        {!!Form::close()!!}
    </div>
@stop


@section('Script')
    <script>
        $("#nivel").change(event => {
            var url = "{{route('car',':ID')}}";
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
            var url = "{{route('setLugar',':ID')}}";
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

            var url = "{{route('showLugar')}}";
            table_val=document.getElementById("tablaLugares");
            var fila="";
            $.get(url,function (res,state) {
                $("#tablaLugares").empty();
                var i=1;
                for(element in res ){

                    var urlD = "{{route('deletLugar',':ID')}}";
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
@stop