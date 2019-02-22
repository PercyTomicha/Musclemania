            <div class="form-group">
                {!!Form::label('id_nivel','Nivel Académico',['class'=>'col-sm-2 control-label'])!!}
                <div class="col-sm-4">
                    {!!Form::select('id_nivel',$niveles, null, ['class'=>'form-control','placeholder' => 'Seleccione un Nivel Académico...']);!!}
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                {!!Form::label('id_cargo','Cargo',['class'=>'col-sm-2 control-label'])!!}
                <div class="col-sm-4">
                    {!!Form::select('id_cargo',$cargos, null, ['class'=>'form-control','placeholder' => 'Seleccione un Cargo...']);!!}
                </div>
            </div>
            <div class="hr-line-dashed"></div>