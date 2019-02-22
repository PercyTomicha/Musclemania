            <div class="form-group">
                {!!Form::label('sigla','Sigla',['class'=>'col-sm-2 control-label'])!!}
                <div class="col-sm-2">
                    {!!Form::text('sigla',null,['class'=>'form-control','placeholder'=>'Ej. INF','required'])!!}
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                {!!Form::label('nombre','Nombre de la Carrera',['class'=>'col-sm-2 control-label'])!!}
                <div class="col-sm-4">
                    {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ej: Operador en Informática','required'])!!}      
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                {!!Form::label('id_nivel','Nivel Académico',['class'=>'col-sm-2 control-label'])!!}
                <div class="col-sm-4">
                    {!!Form::select('id_nivel',$niveles, null, ['class'=>'form-control','placeholder' => 'Seleccione un Nivel Académico...','id'=>'id_nivel']);!!}
                </div>
            </div>

            <div class="hr-line-dashed"></div>
            <div class="form-group">
                {!!Form::label('costo','Costo Bs:',['class'=>'col-sm-2 control-label'])!!}
                <div class="col-sm-4">
                    {!!Form::text('costo',null,['class'=>'form-control','placeholder'=>'Ej: 200','required'])!!}
                </div>
            </div>


            <div id="line" class="hr-line-dashed"></div>


            <div id="cc" class="form-group">
                {!!Form::label('horas','Horas totales a cursar',['class'=>'col-sm-2 control-label'])!!}
                <div class="col-sm-2">
                    {!!Form::text('horas',null,['class'=>'form-control','placeholder'=>'Ej. 30'])!!}
                </div>
            </div>
            <div id="line" class="hr-line-dashed"></div>