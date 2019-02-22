@extends('layouts.principal')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Lista de Titulos Emitidos</h2>
            <ol class="breadcrumb">
                <li><a href="/index">Inicio</a></li>
                <li class="active"><strong>Listado de Titulos</strong></li>
            </ol>
        </div>
    </div>
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">

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
                                        <th>Numeracion</th>
                                        <th>Fecha de Emision</th>
                                        <th>Nombre</th>
                                        <th>Apellido Paterno</th>
                                        <th>Apellido Materno</th>
                                        <th>Costo</th>
                                        <th>Recogedor</th>
                                        <th>Fecha de Entrega</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php $i=1 @endphp
                                @foreach($titulos as $c)
                                    <tr class="gradeX">
                                        <td>{{$i}}</td>
                                        <td>{{$c->numeracion}}</td>
                                        <td>{{$c->fechaEmision}}</td>
                                        <td>{{$c->N}}</td>
                                        <td>{{$c->AP}}</td>
                                        <td>{{$c->AM}}</td>
                                        <td>{{$c->costo}}</td>
                                        <td>{{$c->recogedor}}</td>
                                        <td>{{$c->fechaEntrega}}</td>

                                        @php $i=$i+1 @endphp
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@stop