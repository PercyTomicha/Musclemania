            <div class="form-group">
                {!!Form::label('id_Carrera','Carrera',['class'=>'col-sm-2 control-label'])!!}
                <div class="col-sm-4">
                    {!!Form::select('id_Carrera',$carreras, null, ['class'=>'form-control','placeholder' => 'Seleccione una Carrera...']);!!}
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                {!!Form::label('gestion_de_registro','Gestión que Ingreso',['class'=>'col-sm-2 control-label'])!!}
                <div class="col-sm-4">
                    {!!Form::text('gestion_de_registro',null,['class'=>'form-control','placeholder'=>'Ej: 17,18,19','required'])!!}      
                </div>
            </div>
            <div class="hr-line-dashed"></div>