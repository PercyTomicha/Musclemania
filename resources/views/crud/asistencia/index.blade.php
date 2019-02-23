@extends('layouts.principal')
@section('content')
    <?php
        session_start();
        if(isset($_SESSION['asicontador'])==0){
            $_SESSION['asicontador']=0;
        }
        ++$_SESSION['asicontador'];
        echo "<p style=".'"'."color:red".'"'."href=\"asicontador.php\">Has recargado esta Página ".$_SESSION['asicontador']." Veces</p>";
    ?>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Lista de Asistencias</h2>
            <ol class="breadcrumb">
                <li><a href="/index">Inicio</a></li>
                <li class="active"><strong>Listado de Asistencias</strong></li>
            </ol>
        </div>
    </div>
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <a href="{{route('asistencia.create')}}" class="btn btn-w-m btn-primary"><i class="fa fa-plus"></i> Agregar Nueva <strong>Asistencia</strong></a>
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
                                        <!--<th style="width: 64px;">Nombre</th>-->
                                        <th>Fecha</th>
                                        <th>Hora de Llegada</th>
                                        <th>Se Presentó?</th>
                                        <th>Usuario</th>
                                        @if(Auth::user()->tipo==1)
                                            <th>Acción</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                @php $i=1 @endphp
                                @foreach($asistencias as $a)
                                    <tr class="gradeX">
                                        <td>{{$i}}</td>
                                        <td>{{$a->fecha}}</td>
                                        <td>{{$a->hora}} Hrs.</td>
                                        @if($a->presencia)
                                            <th style="color:green">Sí</th>
                                        @else
                                            <th style="color:red">No</th>
                                        @endif
                                        <td>{{$a->UN}} {{$a->UA}}</td>
                                        @if(Auth::user()->tipo==1)
                                        <td>
                                            <a class="btn btn-w-m btn-info" href="{{ route('asistencia.edit',$a->id) }}"><i class="fa fa-edit"></i> Editar</a>
                                            {!! Form::open(['method' => 'DELETE','route' => ['asistencia.destroy', $a->id],'style'=>'display:inline']) !!}
                                                {!!Form::button('<i class="fa fa-trash-o"></i> Eliminar', ['type' => 'submit', 'class' => 'btn btn-w-m btn-danger'] )!!}
                                            {!! Form::close() !!}
                                        </td>
                                        @else
                                        <td style="display: none">
                                            <a class="btn btn-w-m btn-info" href="{{ route('asistencia.edit',$a->id) }}"><i class="fa fa-edit"></i> Editar</a>
                                            {!! Form::open(['method' => 'DELETE','route' => ['asistencia.destroy', $a->id],'style'=>'display:inline']) !!}
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
                                        <th>Fecha</th>
                                        <th>Hora de Llegada</th>
                                        <th>Se Presentó?</th>
                                        <th>Usuario</th>
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