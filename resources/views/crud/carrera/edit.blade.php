@extends('layouts.principal')
@section('content')
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
        {!! Form::model($carrera, ['method' => 'PATCH','class'=>'form-horizontal','route' => ['carrera.update', $carrera->id]]) !!}
            
            @include('crud.carrera.formulario')

            {!!Form::submit('Actualizar',['class'=>'btn btn-w-m btn-primary'])!!}
        {!!Form::close()!!}
    </div>
@stop

@section('Script')
    <script>
        var idNivelActual={!! json_encode($nivelActual) !!};
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
@stop