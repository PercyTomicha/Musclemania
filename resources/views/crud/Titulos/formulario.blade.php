            <div class="form-group">
                {!!Form::label('numeracion','Numeracion',['class'=>'col-sm-2 control-label'])!!}
                <div class="col-sm-2">
                    {!!Form::text('numeracion',null,['class'=>'form-control','placeholder'=>'','required'])!!}
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                {!!Form::label('fechaEmision','Fecha Emitida',['class'=>'col-sm-2 control-label'])!!}
                <div class="col-sm-4">
                    {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ej: Operador en Informática','required'])!!}
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                {!!Form::label('id_estudiante','Estudiante',['class'=>'col-sm-2 control-label'])!!}
                <div class="col-sm-4">
                    {!!Form::select('id_estudiante',$estudiantes, null, ['class'=>'form-control','placeholder' => 'Seleccione un Estudiante...']);!!}
                </div>
            </div>
            <div class="form-group">
                {!!Form::label('costo','Costo',['class'=>'col-sm-2 control-label'])!!}
                <div class="col-sm-4">
                    {!!Form::text('costo',null,['class'=>'form-control','placeholder'=>'Ej: 100','required'])!!}
                </div>
            </div>
            <div class="form-group">
                {!!Form::label('recogedor','Recogido por',['class'=>'col-sm-2 control-label'])!!}
                <div class="col-sm-4">
                    {!!Form::text('recogedor',null,['class'=>'form-control','placeholder'=>'','required'])!!}
                </div>
            </div>
            <div class="form-group">
                {!!Form::label('fechaEntrega','Fecha de Entrega',['class'=>'col-sm-2 control-label'])!!}
                <div class="col-sm-4">
                    {!!Form::text('fechaEntrega',null,['class'=>'form-control','placeholder'=>'','required'])!!}
                </div>
            </div>


            <div class="hr-line-dashed"></div>