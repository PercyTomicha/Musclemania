            <div class="form-group">
                <?php echo Form::label('nombres','Nombres',['class'=>'col-sm-2 control-label']); ?>

                <div class="col-sm-8">
                    <?php echo Form::text('nombres',null,['class'=>'form-control','placeholder'=>'Ej. Juan Pedro','required']); ?>      
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <?php echo Form::label('apellidos','Apellidos',['class'=>'col-sm-2 control-label']); ?>

                <div class="col-sm-8">
                    <?php echo Form::text('apellidos',null,['class'=>'form-control','placeholder'=>'Ej. Torrez Delgadillo','required']); ?>      
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <?php echo Form::label('telefono','Telefono',['class'=>'col-sm-2 control-label']); ?>

                <div class="col-sm-8">
                    <?php echo Form::text('telefono',null,['class'=>'form-control','placeholder'=>'Ej. 71223345','required']); ?>      
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <?php echo Form::label('fecha_nacimiento','Fecha de Nacimiento',['class'=>'col-sm-2 control-label']); ?>

                <div class="col-sm-8">
                    <?php echo Form::date('fecha_nacimiento',\Carbon\Carbon::now(),['class'=>'form-control','placeholder'=>'Seleccione una Fecha','required']); ?>

                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <?php echo Form::label('tipo','Tipo',['class'=>'col-sm-2 control-label']); ?>

                <div class="col-sm-8">
                    <?php echo Form::select('tipo',['1' => 'Administrador', '2' => 'Socio', '3' => 'Instructor'], null, ['class'=>'form-control','placeholder' => 'Seleccione el Tipo de Usuario...','required']); ?>      
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <?php echo Form::label('estado','Estado',['class'=>'col-sm-2 control-label']); ?>

                <div class="col-sm-8">
                    <?php echo Form::select('estado',[true => 'Activo', false => 'Inactivo'], null, ['class'=>'form-control','placeholder' => 'Seleccione el Estado de Usuario...','required']); ?>      
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <?php echo Form::label('email','Correo Electrónico',['class'=>'col-sm-2 control-label']); ?>

                <div class="col-sm-8">
                    <?php echo Form::text('email',null,['class'=>'form-control','placeholder'=>'Ej. ejemplo@gmail.com','required']); ?>      
                </div>
            </div>
            <div class="hr-line-dashed"></div>