            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <?php echo Form::label('fecha','Fecha',['class'=>'col-sm-2 control-label']); ?>

                <div class="col-sm-8">
                    <?php echo Form::date('fecha',\Carbon\Carbon::now(),['class'=>'form-control','placeholder'=>'Seleccione una Fecha','required']); ?>

                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <?php echo Form::label('id_usuario','Socio',['class'=>'col-sm-2 control-label']); ?>

                <div class="col-sm-4">
                    <?php if($socios->count()==0): ?>
                        <h4 style="color:red"><strong>* No hay Socios Registrados</strong></h4>
                    <?php endif; ?>
                    <?php echo Form::select('id_usuario',$socios, null, ['class'=>'form-control','placeholder' => 'Seleccione el Socio...','id'=>'id_producto']);; ?>

                </div>
            </div>
            <div id="line" class="hr-line-dashed"></div>
            <div class="form-group">
                <?php echo Form::label('id_rutina','Rutina',['class'=>'col-sm-2 control-label']); ?>

                <div class="col-sm-4">
                    <?php if($rutinas->count()==0): ?>
                        <h4 style="color:red"><strong>* No hay Rutinas Registradas</strong></h4>
                    <?php endif; ?>
                    <?php echo Form::select('id_rutina',$rutinas, null, ['class'=>'form-control','placeholder' => 'Seleccione la Rutina...','id'=>'id_producto']);; ?>

                </div>
            </div>
            <div id="line" class="hr-line-dashed"></div>