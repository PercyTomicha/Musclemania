@extends('layouts.principal')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Registro de Carrera</h2>
            <ol class="breadcrumb">
                <li><a href="/index">Inicio</a></li>
                <li class="active"><strong>Registro de Carrera</strong></li>
            </ol>
        </div>
    </div>
    <div class="ibox-content">
        <a href="{{route('carrera.index')}}" class="btn btn-w-m btn-primary"><i class="fa fa-list-ol"></i>Listado de <strong>Carrera</strong></a>
        <div class="hr-line-dashed"></div>
        {!!Form::open(['route'=>['carrera.store'],'files'=>true,'method'=>'POST','class'=>'form-horizontal'])!!}
            
            @include('crud.carrera.formulario')

            {!!Form::submit('Registrar',['class'=>'btn btn-w-m btn-primary'])!!}
        {!!Form::close()!!}
    </div>
@stop

@section('Script')
    <script>
        $("#nivel").ready(event => {
            console.log("scrip ready ejecutado");
            $("#line").hide();
            $("#cc").hide();
        });

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
@stop