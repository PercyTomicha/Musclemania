@extends('layouts.principal')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Lista de Carreras</h2>
            <ol class="breadcrumb">
                <li><a href="/index">Inicio</a></li>
                <li class="active"><strong>Listado de Carreras</strong></li>
            </ol>
        </div>
    </div>
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <a href="{{route('carrera.create')}}" class="btn btn-w-m btn-primary"><i class="fa fa-plus"></i> Agregar Nueva <strong>Carrera</strong></a>
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
                                        <th>Sigla</th>
                                        <th>Carrera</th>
                                        <th>Nivel</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php $i=1 @endphp
                                @foreach($carreras as $c)
                                    <tr class="gradeX">
                                        <td>{{$i}}</td>
                                        <td>{{$c->sigla}}</td>
                                        <td>{{$c->nombre}}</td>
                                        <td>{{$c->N}}</td>
                                        <td><a class="btn btn-w-m btn-info" href="{{ route('carrera.edit',$c->id) }}"><i class="fa fa-edit"></i> Editar</a>
                                            {!! Form::open(['method' => 'DELETE','route' => ['carrera.destroy', $c->id],'style'=>'display:inline']) !!}
                                                {{Form::button('<i class="fa fa-trash-o"></i> Eliminar', ['type' => 'submit', 'class' => 'btn btn-w-m btn-danger'] )  }}
                                            {!! Form::close() !!}
                                        </td>
                                        @php $i=$i+1 @endphp
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Sigla</th>
                                        <th>Carrera</th>
                                        <th>Nivel</th>
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