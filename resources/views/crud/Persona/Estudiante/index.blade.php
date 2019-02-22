@extends('layouts.principal')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Lista de Estudiantes</h2>
            <ol class="breadcrumb">
                <li><a href="/index">Inicio</a></li>
                <li class="active"><strong>Listado de Estudiantes</strong></li>
            </ol>
        </div>
    </div>
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <a href="{{route('estudiante.create')}}" class="btn btn-w-m btn-primary"><i class="fa fa-plus"></i> Agregar Nuevo <strong>Estudiante</strong></a>
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
                                        <th>Nombre</th>
                                        <th>Apellido Paterno</th>
                                        <th>Apellido Materno</th>
                                        <th>CI</th>
                                        <th>Expedido en</th>
                                        <th>Fecha de Nacimiento</th>
                                        <th>Telefono</th>
                                        <th>Celular</th>
                                        <th>Email</th>
                                        <th>Pais</th>
                                        <th>Ciudad</th>
                                        <th>Direccion</th>
                                        <th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php $i=1 @endphp
                                @foreach($estudiantes as $n)
                                    <tr class="gradeX">
                                        <td>{{$i}}</td>
                                        <td>{{$n->nombre}}</td>
                                        <td>{{$n->apellidoPaterno}}</td>
                                        <td>{{$n->apellidoMaterno}}</td>
                                        <td>{{$n->ci}}</td>
                                        <td>{{$n->ExpedidoEn}}</td>
                                        <td>{{$n->fechaNacimiento}}</td>
                                        <td>{{$n->telefono}}</td>
                                        <td>{{$n->celular}}</td>
                                        <td>{{$n->correoElectronico}}</td>
                                        <td>{{$n->pais}}</td>
                                        <td>{{$n->ciudad}}</td>
                                        <td>{{$n->direccion}}</td>
                                        <td><a class="btn btn-w-m btn-info" href="{{ route('estudiante.edit',$n->id) }}"><i class="fa fa-edit"></i> Editar</a>
                                            {!! Form::open(['method' => 'DELETE','route' => ['estudiante.destroy', $n->id],'style'=>'display:inline']) !!}
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
                                        <th>Nombre</th>
                                        <th>Apellido Paterno</th>
                                        <th>Apellido Materno</th>
                                        <th>CI</th>
                                        <th>Expedido en</th>
                                        <th>Fecha de Nacimiento</th>
                                        <th>Telefono</th>
                                        <th>Celular</th>
                                        <th>Email</th>
                                        <th>Pais</th>
                                        <th>Ciudad</th>
                                        <th>Direccion</th>
                                        <th>Accion</th>
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