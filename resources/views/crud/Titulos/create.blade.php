@extends('layouts.principal')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Registro de Titulo</h2>
            <ol class="breadcrumb">
                <li><a href="/index">Inicio</a></li>
                <li class="active"><strong>Registro de Titulo</strong></li>
            </ol>
        </div>
    </div>
    <div class="ibox-content">
        <a href="{{route('titulo.index')}}" class="btn btn-w-m btn-primary"><i class="fa fa-list-ol"></i>Listado de <strong>Titulos</strong></a>
        <div class="hr-line-dashed"></div>
        {!!Form::open(['route'=>['titulo.store'],'files'=>true,'method'=>'POST','class'=>'form-horizontal'])!!}
            
            @include('crud.Titulos.formulario')

            {!!Form::submit('Registrar',['class'=>'btn btn-w-m btn-primary'])!!}
        {!!Form::close()!!}
    </div>
@stop