@extends('layouts.principal')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Registro de Firmante</h2>
            <ol class="breadcrumb">
                <li><a href="/index">Inicio</a></li>
                <li class="active"><strong>Registro de Firmante</strong></li>
            </ol>
        </div>
    </div>
    <div class="ibox-content">
        <a href="{{route('firmante.index')}}" class="btn btn-w-m btn-primary"><i class="fa fa-list-ol"></i>Listado de <strong>Firmante</strong></a>
        <div class="hr-line-dashed"></div>
        {!!Form::open(['route'=>['firmante.store'],'files'=>true,'method'=>'POST','class'=>'form-horizontal'])!!}
        
            @include('crud.firmante.formulario')

            {!!Form::submit('Registrar',['class'=>'btn btn-w-m btn-primary'])!!}
        {!!Form::close()!!}
    </div>
@stop