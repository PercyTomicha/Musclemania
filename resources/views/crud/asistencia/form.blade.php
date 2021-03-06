            <div class="form-group">
                {!!Form::label('fecha','Fecha de Asistencia',['class'=>'col-sm-2 control-label'])!!}
                <div class="col-sm-8">
                    {!!Form::date('fecha',\Carbon\Carbon::now(),['class'=>'form-control','placeholder'=>'Seleccione una Fecha','required'])!!}
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                {!!Form::label('hora','Hora de Llegada:',['class'=>'col-sm-2 control-label'])!!}
                <div class="col-sm-4">
                    {!!Form::text('hora',null,['class'=>'form-control','placeholder'=>'Ej: 0...23','required'])!!}
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                {!!Form::label('presencia','Está Presente?',['class'=>'col-sm-2 control-label'])!!}
                <div class="col-sm-8">
                    {!!Form::select('presencia',[true => 'Sí', false => 'No'], null, ['class'=>'form-control','placeholder' => 'Seleccione una Opción...','required'])!!}      
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                {!!Form::label('id_usuario','Socio',['class'=>'col-sm-2 control-label'])!!}
                <div class="col-sm-4">
                    @if($socios->count()==0)
                        <h4 style="color:red"><strong>* No hay Socios Registrados</strong></h4>
                    @endif
                    {!!Form::select('id_usuario',$socios, null, ['class'=>'form-control','placeholder' => 'Seleccione el Socio...','id'=>'id_producto']);!!}
                </div>
            </div>
            <div id="line" class="hr-line-dashed"></div>