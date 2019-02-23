            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <?php echo Form::label('fecha_inicio','Fecha de Inicio',['class'=>'col-sm-2 control-label']); ?>

                <div class="col-sm-8">
                    <?php echo Form::date('fecha_inicio',\Carbon\Carbon::now(),['class'=>'form-control','placeholder'=>'Seleccione una Fecha','required']); ?>

                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <?php echo Form::label('fecha_fin','Fecha Final',['class'=>'col-sm-2 control-label']); ?>

                <div class="col-sm-8">
                    <?php echo Form::date('fecha_fin',\Carbon\Carbon::now(),['class'=>'form-control','placeholder'=>'Seleccione una Fecha','required']); ?>

                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <?php echo Form::label('id_usuario','Socio',['class'=>'col-sm-2 control-label']); ?>

                <div class="col-sm-4">
                    <?php echo Form::select('id_usuario',$socios, null, ['class'=>'form-control','placeholder' => 'Seleccione el Socio...','id'=>'id_producto']);; ?>

                </div>
            </div>
            <div id="line" class="hr-line-dashed"></div>
            <div class="form-group">
                <?php echo Form::label('id_promocion','Promocion',['class'=>'col-sm-2 control-label']); ?>

                <div class="col-sm-4">
                    <?php echo Form::select('id_promocion',$promociones, null, ['class'=>'form-control','placeholder' => 'Seleccione la Promocion...','id'=>'id_producto']);; ?>

                </div>
            </div>
            <div id="line" class="hr-line-dashed"></div>
            <div class="form-group">
                <?php echo Form::label('monto','Monto Bs:',['class'=>'col-sm-2 control-label']); ?>

                <div class="col-sm-4">
                    <?php echo Form::text('monto',null,['class'=>'form-control','placeholder'=>'Ej: 10','required']); ?>

                </div>
            </div>
            <div class="hr-line-dashed"></div>