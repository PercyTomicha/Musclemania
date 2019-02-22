            <div class="form-group">
                {!!Form::label('nivel','Nivel Académico',['class'=>'col-sm-2 control-label'])!!}
                <div class="col-sm-4">
                    {!! Form::select('nivel',$niveles,$idNivel,['class'=>'form-control','placeholder' => 'Seleccione un Nivel Académico...','id'=>'nivel','required']) !!}
                </div>


                {!!Form::label('idCarrera','Carrera',['class'=>'col-sm-2 control-label'])!!}
                <div class="col-sm-4">
                    {!! Form::select('idCarrera',['placeholder'=>'Selecciona'], $idCarrera,['class'=>'form-control','id'=>'idCarrera','required']) !!}
                </div>

            </div>

            <div class="hr-line-dashed"></div>
            <div class="form-group">
                {!!Form::label('fechaInicio','Inicio de Oferta',['class'=>'col-sm-2 control-label'])!!}
                <div class="col-sm-4">
                    {!!Form::date('fechaInicio',null,['class'=>'form-control','placeholder'=>'Ej: 1-12-1885','required'])!!}
                </div>


                {!!Form::label('fechaConclusion','Cierre de Oferta',['class'=>'col-sm-2 control-label'])!!}
                <div class="col-sm-4">
                    {!!Form::date('fechaConclusion',null,['class'=>'form-control','placeholder'=>'Ej: 1-12-1885','required'])!!}
                </div>

            </div>

            <div class="hr-line-dashed"></div>
            <div class="form-group">
                {!!Form::label('idLugar','Lugar de Registro',['class'=>'col-sm-2 control-label'])!!}
                <div class="col-sm-4">
                    {!! Form::select('idLugar',$lugares,null,['class'=>'form-control','placeholder' => 'Seleccione un Lugar...','id'=>'selectLugar']) !!}
                </div>
                <div>
                    <!--<a href="www.google.com" class="btn btn-primary btn-circle">+</a>-->
                    <button id="BotonMas" type="button" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#myModal">
                        +
                    </button>
                </div>
                <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div id="modalLugar" class="modal-content animated bounceInRight">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <i class="fa fa-map-marker modal-icon" aria-hidden="true"></i>
                                <h4 class="modal-title">Gestor de Lugar</h4>
                                <small class="font-bold">En esta seccion usted podra agregar y eliminar lugares de donde se ofertan las carreras.
                                    Considere que debe elegir el lugar donde se encuentra el establecimiento.</small>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">

                                    {!!Form::label('nombreLugar','Nombre: ',['class'=>'col-sm-2 control-label'])!!}
                                    <div class="col-sm-6">
                                        {!!Form::text('nombreLugar',null,['class'=>'form-control','placeholder'=>'Ej. Santa Cruz de la Sierra','id'=>'textoModal'])!!}
                                    </div>
                                    <a class="btn btn-primary" id="botonLugar" >Agregar Lugar</a>


                                </div>
                                <div class="ibox-content">
                                    <div class="table-responsive">
                                        <table  class="table table-striped table-bordered table-hover " >
                                            <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th colspan="8" class="col-sm-8">Nombre</th>
                                                <th >Acción</th>
                                            </tr>
                                            </thead>
                                            <tbody id="tablaLugares">

                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>Id</th>
                                                <th colspan="8" class="col-sm-8">Nombre</th>
                                                <th >Acción</th>
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
                            <div class="modal-footer">
                                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

