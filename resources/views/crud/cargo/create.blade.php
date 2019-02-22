@extends('layouts.principal')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Registro de Cargo</h2>
            <ol class="breadcrumb">
                <li><a href="/index">Inicio</a></li>
                <li class="active"><strong>Registro de Cargo</strong></li>
            </ol>
        </div>
    </div>
    <div class="ibox-content">
        <a href="{{route('cargo.index')}}" class="btn btn-w-m btn-primary"><i class="fa fa-list-ol"></i>Listado de <strong>Cargo</strong></a>
        <div class="hr-line-dashed"></div>
        {!!Form::open(['route'=>['cargo.store'],'files'=>true,'method'=>'POST','class'=>'form-horizontal'])!!}

            @include('crud.cargo.formulario')

            {!!Form::submit('Registrar',['class'=>'btn btn-w-m btn-primary'])!!}
        {!!Form::close()!!}
    </div>
@stop