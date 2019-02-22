@extends('layouts.principal')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Actualización de Autoridad</h2>
            <ol class="breadcrumb">
                <li><a href="/index">Inicio</a></li>
                <li class="active"><strong>Actualización de Autoridad</strong></li>
            </ol>
        </div>
    </div>
    <div class="ibox-content">
        <div class="hr-line-dashed"></div>
        {!! Form::model($autoridad, ['method' => 'PATCH','class'=>'form-horizontal','route' => ['autoridad.update', $autoridad->id]]) !!}
            
            @include('crud.autoridad.formulario')

            {!!Form::submit('Actualizar',['class'=>'btn btn-w-m btn-primary'])!!}
        {!!Form::close()!!}
    </div>
@stop