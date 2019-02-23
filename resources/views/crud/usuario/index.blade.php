@extends('layouts.principal')
@section('content')
    <?php
        session_start();
        if(isset($_SESSION['usecontador'])==0){
            $_SESSION['usecontador']=0;
        }
        ++$_SESSION['usecontador'];
        echo "<p style=".'"'."color:red".'"'."href=\"usecontador.php\">Has recargado esta Página ".$_SESSION['usecontador']." Veces</p>";
    ?>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Lista de Usuarios</h2>
            <ol class="breadcrumb">
                <li><a href="/index">Inicio</a></li>
                <li class="active"><strong>Listado de Usuarios</strong></li>
            </ol>
        </div>
    </div>
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <a href="{{route('usuario.create')}}" class="btn btn-w-m btn-primary"><i class="fa fa-plus"></i> Agregar Nuevo <strong>Usuario</strong></a>
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
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Telefono</th>
                                        <th>Fecha de Nacimiento</th>
                                        <th>Correo Electrónico</th>
                                        <th>Tipo</th>
                                        <th>Estado</th>
                                        @if(Auth::user()->tipo==1)
                                            <th>Acción</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                @php $i=1 @endphp
                                @foreach($usuarios as $u)
                                    <tr class="gradeX">
                                        <td>{{$i}}</td>
                                        <td>{{$u->nombres}}</td>
                                        <td>{{$u->apellidos}}</td>
                                        <td>{{$u->telefono}}</td>
                                        <td>{{$u->fecha_nacimiento}}</td>
                                        <td>{{$u->email}}</td>
                                        @if($u->tipo==1)
                                        	<td style="color:green;"><strong>Administrador</strong></td>
                                        @else
                                        	@if($u->tipo==2)
                                        		<td><strong>Socio</strong></td>
                                        	@else
                                            	<td style="color:blue;"><strong>Instructor</strong></td>
                                            @endif
                                        @endif
                                        @if($u->estado==1)
                                        	<td style="color:green;"><strong>Activo</strong></td>
                                        @else
                                        	<td style="color:red;"><strong>Inactivo</strong></td>
                                        @endif
                                        @if(Auth::user()->tipo==1)
                                        <td>
                                            <a class="btn btn-w-m btn-info" href="{{ route('usuario.edit',$u->id) }}"><i class="fa fa-edit"></i> Editar</a>
                                            {!! Form::open(['method' => 'DELETE','route' => ['usuario.destroy', $u->id],'style'=>'display:inline']) !!}
                                                {!!Form::button('<i class="fa fa-trash-o"></i> Eliminar', ['type' => 'submit', 'class' => 'btn btn-w-m btn-danger'] )!!}
                                            {!! Form::close() !!}
                                        </td>
                                        @else
                                        <td style="display: none">
                                            <a class="btn btn-w-m btn-info" href="{{ route('usuario.edit',$u->id) }}"><i class="fa fa-edit"></i> Editar</a>
                                            {!! Form::open(['method' => 'DELETE','route' => ['usuario.destroy', $u->id],'style'=>'display:inline']) !!}
                                                {!!Form::button('<i class="fa fa-trash-o"></i> Eliminar', ['type' => 'submit', 'class' => 'btn btn-w-m btn-danger'] )!!}
                                            {!! Form::close() !!}
                                        </td>
                                        @endif
                                        @php $i=$i+1 @endphp
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Telefono</th>
                                        <th>Fecha de Nacimiento</th>
                                        <th>Correo Electrónico</th>
                                        <th>Tipo</th>
                                        <th>Estado</th>
                                        @if(Auth::user()->tipo==1)
                                            <th>Acción</th>
                                        @endif
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