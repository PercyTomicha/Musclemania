            <div class="form-group">
                {!!Form::label('nombre','*Nombre',['class'=>'col-sm-2 control-label'])!!}
                <div class="col-sm-2">
                    {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ej. Juan','required'])!!}
                </div>

                {!!Form::label('apellidoPaterno','*Apellido Paterno',['class'=>'col-sm-2 control-label'])!!}
                <div class="col-sm-2">
                    {!!Form::text('apellidoPaterno',null,['class'=>'form-control','placeholder'=>'Ej: Gomez','required'])!!}
                </div>

                {!!Form::label('apellidoMaterno','*Apellido Materno',['class'=>'col-sm-2 control-label'])!!}
                <div class="col-sm-2">
                    {!!Form::text('apellidoMaterno',null,['class'=>'form-control','placeholder'=>'Ej: Gomez','required'])!!}
                </div>
            </div>

            <div class="form-group">
                {!!Form::label('ci','*CI',['class'=>'col-sm-2 control-label'])!!}
                <div class="col-sm-2">
                    {!!Form::text('ci',null,['class'=>'form-control','placeholder'=>'','required'])!!}
                </div>

                {!!Form::label('ExpedidoEn','Expedido En',['class'=>'col-sm-2 control-label'])!!}
                <div class="col-sm-2">
                    {!!Form::text('ExpedidoEn',null,['class'=>'form-control','placeholder'=>'Ej: SC'])!!}
                </div>

                {!!Form::label('fechaNacimiento','*Fecha de Nacimiento',['class'=>'col-sm-2 control-label'])!!}
                <div class="col-sm-2">
                <!--<div class="input-group date">-->
                    {!!Form::date('fechaNacimiento',null,['class'=>'form-control','placeholder'=>'Ej: 1-12-1885','required'])!!}
                </div>

            </div>

            <div class="form-group">
                {!!Form::label('telefono','Telefono',['class'=>'col-sm-2 control-label'])!!}
                <div class="col-sm-2">
                    {!!Form::text('telefono',null,['class'=>'form-control','placeholder'=>'',''])!!}
                </div>

                {!!Form::label('celular','Celular',['class'=>'col-sm-2 control-label'])!!}
                <div class="col-sm-2">
                    {!!Form::text('celular',null,['class'=>'form-control','placeholder'=>''])!!}
                </div>

                {!!Form::label('correoElectronico','Email',['class'=>'col-sm-2 control-label'])!!}
                <div class="col-sm-2">
                    {!!Form::text('correoElectronico',null,['class'=>'form-control','placeholder'=>'Ej: abc@empresa.com',''])!!}
                </div>
            </div>


            <div class="form-group">
                {!!Form::label('pais','*Pais',['class'=>'col-sm-2 control-label'])!!}
                <div class="col-sm-2">
                    {!!Form::text('pais',null,['class'=>'form-control','placeholder'=>'Ej: Bolivia','required'])!!}
                </div>

                {!!Form::label('ciudad','*Ciudad',['class'=>'col-sm-2 control-label'])!!}
                <div class="col-sm-2">
                    {!!Form::text('ciudad',null,['class'=>'form-control','placeholder'=>'Ej: Santa Cruz','required'])!!}
                </div>

                {!!Form::label('direccion','Direccion',['class'=>'col-sm-2 control-label'])!!}
                <div class="col-sm-2">
                    {!!Form::text('direccion',null,['class'=>'form-control','placeholder'=>'Ej: Barrio el paraiso'])!!}
                </div>
            </div>


            <div class="hr-line-dashed"></div>