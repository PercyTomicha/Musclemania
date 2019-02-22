@extends('layouts.principal')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Lista de Inscritos</h2>
            <ol class="breadcrumb">
                <li><a href="/index">Inicio</a></li>
                <li class="active"><strong>Listado de Inscritos</strong></li>
            </ol>
        </div>
    </div>
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <a href="{{route('inscribe.create')}}" class="btn btn-w-m btn-primary"><i class="fa fa-plus"></i> Agregar Nuevo <strong>Inscritos</strong></a>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Carrera</th>
                                        <th>Nombre(s) del Estudiante</th>
                                        <th>Apellido(s) del Estudiante</th>
                                        <th>Nro. de Registro</th>

                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php $i=1 @endphp
                                @foreach($inscribes as $in)
                                    <tr class="gradeX">
                                        <td>{{$i}}</td>
                                        <td>{{$in->carrera}}</td>
                                        <td>{{$in->EN}}</td>
                                        <td>{{$in->EAP}} {{$in->EAM}}</td>
                                        <td>{{$in->registro}}</td>

                                        <td><a class="btn  btn-info" href="{{ route('inscribe.edit',$in->id) }}"><i class="fa fa-edit"></i> Editar</a>
                                            {!! Form::open(['method' => 'DELETE','route' => ['inscribe.destroy', $in->id],'style'=>'display:inline']) !!}
                                                {{Form::button('<i class="fa fa-trash-o"></i> Eliminar', ['type' => 'submit', 'class' => 'btn btn-danger'] )  }}
                                            {!! Form::close() !!}
                                            <a class="btn btn-info" href="{{ route('titulo',$in->id) }}"><i class="fa fa-print"></i> Imprimir Titulo</a>
                                        </td>
                                        @php $i=$i+1 @endphp
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Carrera</th>
                                        <th>Nombre(s) del Estudiante</th>
                                        <th>Apellido(s) del Estudiante</th>
                                        <th>Nro. de Registro</th>

                                    </tr>
                                    <!--
                                    <tr>
                                        <th>Rendering engine</th>
                                        <th>Browser</th>
                                        <th>Platform(s)</th>
                                        <th>Engine version</th>
                                        <th>CSS grade</th>
                                    </tr>
                                    -->
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@stop