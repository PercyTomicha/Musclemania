@extends('layouts.principal')
@section('content')
    <?php
        session_start();
        if(isset($_SESSION['soccontador'])==0){
            $_SESSION['soccontador']=0;
        }
        ++$_SESSION['soccontador'];
        echo "<p style=".'"'."color:red".'"'."href=\"soccontador.php\">Has recargado esta Página ".$_SESSION['soccontador']." Veces</p>";
    ?>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Lista de Rutinas de Socios</h2>
            <ol class="breadcrumb">
                <li><a href="/index">Inicio</a></li>
                <li class="active"><strong>Listado de Rutinas de Socios</strong></li>
            </ol>
        </div>
    </div>
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <a href="{{route('socio_rutina.create')}}" class="btn btn-w-m btn-primary"><i class="fa fa-plus"></i> Agregar Nueva <strong>Rutina de Socio</strong></a>
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
                                        <th>Socio</th>
                                        <th>Rutina</th>
                                        @if(Auth::user()->tipo==1)
                                            <th>Acción</th>
                                        @endif
                                    </tr>
                                </thead>
                                @php $sum=0 @endphp
                                <tbody>
                                @php $i=1 @endphp
                                @foreach($socio_rutinas as $s)
                                    <tr class="gradeX">
                                        <td>{{$i}}</td>
                                        <td>{{$s->fecha}}</td>
                                        <td>{{$s->UN}} {{$s->UA}}</td>
                                        <td>{{$s->RN}}-{{$s->RM}}</td>
                                        @if(Auth::user()->tipo==1)
                                        <td>
                                            <a class="btn btn-w-m btn-info" href="{{ route('socio_rutina.edit',$s->id) }}"><i class="fa fa-edit"></i> Editar</a>
                                            {!! Form::open(['method' => 'DELETE','route' => ['socio_rutina.destroy', $s->id],'style'=>'display:inline']) !!}
                                                {!!Form::button('<i class="fa fa-trash-o"></i> Eliminar', ['type' => 'submit', 'class' => 'btn btn-w-m btn-danger'] )!!}
                                            {!! Form::close() !!}
                                        </td>
                                        @else
                                        <td style="display: none">
                                            <a class="btn btn-w-m btn-info" href="{{ route('socio_rutina.edit',$s->id) }}"><i class="fa fa-edit"></i> Editar</a>
                                            {!! Form::open(['method' => 'DELETE','route' => ['socio_rutina.destroy', $s->id],'style'=>'display:inline']) !!}
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
                                        <th>Socio</th>
                                        <th>Rutina</th>
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