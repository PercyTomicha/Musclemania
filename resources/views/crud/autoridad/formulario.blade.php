            <div class="form-group">
                {!!Form::label('rango','Rango de la Autoridad',['class'=>'col-sm-2 control-label'])!!}
                <div class="col-sm-4">
                    {!!Form::text('rango',null,['class'=>'form-control','placeholder'=>'Ej: Lic, M.Sc.','required'])!!}      
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                {!!Form::label('nombres','Nombres de la Autoridad',['class'=>'col-sm-2 control-label'])!!}
                <div class="col-sm-4">
                    {!!Form::text('nombres',null,['class'=>'form-control','placeholder'=>'Ej: Jose Luis','required'])!!}      
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                {!!Form::label('apellidos','Apellidos de la Autoridad',['class'=>'col-sm-2 control-label'])!!}
                <div class="col-sm-4">
                    {!!Form::text('apellidos',null,['class'=>'form-control','placeholder'=>'Ej: Flores Campos','required'])!!}      
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