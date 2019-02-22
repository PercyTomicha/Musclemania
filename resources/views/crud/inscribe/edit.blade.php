@extends('layouts.principal')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Actualización de Inscripción</h2>
            <ol class="breadcrumb">
                <li><a href="/index">Inicio</a></li>
                <li class="active"><strong>Actualización de Inscripción</strong></li>
            </ol>
        </div>
    </div>
    <div class="ibox-content">
        <div class="hr-line-dashed"></div>
        {!! Form::model($inscribe, ['method' => 'PATCH','class'=>'form-horizontal','route' => ['inscribe.update', $inscribe->id]]) !!}
            
            @include('crud.inscribe.formulario')
            <div class="form-group">
                {!!Form::label('id_Estudiante','Estudiantes',['class'=>'col-sm-2 control-label'])!!}
                <div class="col-sm-4">
                    {!!Form::select('id_Estudiante',$estudiantes, null, ['class'=>'form-control','id'=>'estudiantes']);!!}
                </div>
            </div>
            {!!Form::submit('Actualizar',['class'=>'btn btn-w-m btn-primary'])!!}
        {!!Form::close()!!}
    </div>
@stop