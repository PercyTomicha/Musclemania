@extends('layouts.principal')
@section('content')
    <?php
        session_start();
        if(isset($_SESSION['alicontador'])==0){
            $_SESSION['alicontador']=0;
        }
        ++$_SESSION['alicontador'];
        echo "<p style=".'"'."color:red".'"'."href=\"alicontador.php\">Has recargado esta Página ".$_SESSION['alicontador']." Veces</p>";
    ?>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Lista de Alimentaciones</h2>
            <ol class="breadcrumb">
                <li><a href="/index">Inicio</a></li>
                <li class="active"><strong>Listado de Alimentaciones</strong></li>
            </ol>
        </div>
    </div>
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <a href="{{route('alimentacion.create')}}" class="btn btn-w-m btn-primary"><i class="fa fa-plus"></i> Agregar Nuevo <strong>Alimentación</strong></a>
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
                                        <th>Nombre</th>
                                        @if(Auth::user()->tipo==1)
                                            <th>Acción</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                @php $i=1 @endphp
                                @foreach($alimentaciones as $a)
                                    <tr class="gradeX">
                                        <td>{{$i}}</td>
                                        <td>{{$a->nombre}}</td>
                                        @if(Auth::user()->tipo==1)
                                        <td>
                                            <a class="btn btn-w-m btn-info" href="{{ route('alimentacion.edit',$a->id) }}"><i class="fa fa-edit"></i> Editar</a>
                                            {!! Form::open(['method' => 'DELETE','route' => ['alimentacion.destroy', $a->id],'style'=>'display:inline']) !!}
                                                {!!Form::button('<i class="fa fa-trash-o"></i> Eliminar', ['type' => 'submit', 'class' => 'btn btn-w-m btn-danger'] )!!}
                                            {!! Form::close() !!}
                                        </td>
                                        @else
                                        <td style="display: none">
                                            <a class="btn btn-w-m btn-info" href="{{ route('alimentacion.edit',$a->id) }}"><i class="fa fa-edit"></i> Editar</a>
                                            {!! Form::open(['method' => 'DELETE','route' => ['alimentacion.destroy', $a->id],'style'=>'display:inline']) !!}
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
                                        <th>Nombre</th>
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