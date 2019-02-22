@extends('layouts.principal')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Registro de Inscripción</h2>
            <ol class="breadcrumb">
                <li><a href="/index">Inicio</a></li>
                <li class="active"><strong>Registro de Inscripción</strong></li>
            </ol>
        </div>
    </div>
    <div class="ibox-content">
        <a href="{{route('inscribe.index')}}" class="btn btn-w-m btn-primary"><i class="fa fa-list-ol"></i>Listado de <strong>Inscripción</strong></a>
        <div class="hr-line-dashed"></div>
        {!!Form::open(['route'=>['inscribe.store'],'files'=>true,'method'=>'POST','class'=>'form-horizontal'])!!}
            @include('crud.inscribe.formulario')
            <div class="form-group">
                {!!Form::label('id_Estudiante','Estudiantes',['class'=>'col-sm-2 control-label'])!!}
                <div class="col-sm-4">
                    {!!Form::select('id_Estudiante[]',$estudiantes, null, ['class'=>'form-control','id'=>'estudiantes','multiple' => true]);!!}
                </div>
            </div>
        <div class="hr-line-dashed"></div>
        <!--
            <div>
                <em>Multiple Select</em>
                <select data-placeholder="Your Favorite Types of Bear" multiple="" class="chosen-select" tabindex="-1" style="display: none;">
                    <option value=""></option>
                    <option>American Black Bear</option>
                    <option>Asiatic Black Bear</option>
                    <option>Brown Bear</option>
                    <option>Giant Panda</option>
                    <option selected="">Sloth Bear</option>
                    <option disabled="">Sun Bear</option>
                    <option selected="">Polar Bear</option>
                    <option disabled="">Spectacled Bear</option>
                </select>
                <div class="chosen-container chosen-container-multi" title="" style="width: 350px;">
                    <ul class="chosen-choices">
                        <li class="search-field">
                            <input class="chosen-search-input default" type="text" autocomplete="off" value="Your Favorite Types of Bear" tabindex="8" style="width: 185.672px;">
                        </li>
                    </ul>
                    <div class="chosen-drop">
                        <ul class="chosen-results">
                            <li class="active-result" data-option-array-index="1">American Black Bear</li>
                            <li class="active-result" data-option-array-index="2">Asiatic Black Bear</li>
                            <li class="active-result" data-option-array-index="3">Brown Bear</li>
                            <li class="active-result" data-option-array-index="4">Giant Panda</li>
                            <li class="active-result" data-option-array-index="5">Sloth Bear</li>
                            <li class="disabled-result" data-option-array-index="6">Sun Bear</li>
                            <li class="active-result" data-option-array-index="7">Polar Bear</li>
                            <li class="disabled-result" data-option-array-index="8">Spectacled Bear</li>
                        </ul>
                    </div>
                </div>
            </div>
            -->
            {!!Form::submit('Registrar',['class'=>'btn btn-w-m btn-primary'])!!}
        {!!Form::close()!!}
    </div>
@stop