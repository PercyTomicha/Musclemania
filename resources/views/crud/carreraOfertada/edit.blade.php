@extends('layouts.principal')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Actualización de Carrera Ofertada</h2>
            <ol class="breadcrumb">
                <li><a href="/index">Inicio</a></li>
                <li class="active"><strong>Actualización de Carrera Ofertada</strong></li>
            </ol>
        </div>
    </div>
    <div class="ibox-content">
        <div class="hr-line-dashed"></div>
        {!! Form::model($carreraOfertada, ['method' => 'PATCH','class'=>'form-horizontal','route' => ['ofertarCarrera.update', $carreraOfertada->id]]) !!}

            @include('crud.carreraOfertada.formulario')

            {!!Form::submit('Actualizar',['class'=>'btn btn-w-m btn-primary'])!!}
        {!!Form::close()!!}
    </div>
@stop

@section('Script')
    <script>
            $("#nivel").ready(event => {

                var idNivel={!! json_encode($idNivel) !!};
                var idCarrera={!! json_encode($idCarrera) !!};

                var url = "{{route('car',':ID')}}";
                url = url.replace(':ID',idNivel);

                $.get(url,function (res, sta) {
                    $("#idCarrera").empty();

                    res.forEach(element =>{
                        if(element.id!=idCarrera)
                            $("#idCarrera").append(`<option value=${element.id}> ${element.nombre} </option>`);
                        else
                            $("#idCarrera").append(`<option selected value=${element.id}> ${element.nombre} </option>`);
                    });
                })
            });

            document.getElementById("nivel").disabled=true;
            document.getElementById("idCarrera").disabled=true;

    </script>
    <script>
            $("#nivel").change(event => {
                console.log("Script Change ejecutado");
                var url = "{{route('car',':ID')}}";
                url = url.replace(':ID',event.target.value);

            $.get(url,function (res,sta){
                $("#idCarrera").empty();

                res.forEach(element => {
                    $("#idCarrera").append(`<option value=${element.id}> ${element.nombre}</option>`);
                });
            });
        });
    </script>


@stop
