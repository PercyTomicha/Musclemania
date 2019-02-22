            <div class="form-group">
                <?php echo Form::label('sigla','Sigla',['class'=>'col-sm-2 control-label']); ?>

                <div class="col-sm-2">
                    <?php echo Form::text('sigla',null,['class'=>'form-control','placeholder'=>'Ej. TA','required']); ?>      
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <?php echo Form::label('nombre','Nivel Académico',['class'=>'col-sm-2 control-label']); ?>

                <div class="col-sm-2">
                    <?php echo Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ej: Auxiliar','required']); ?>      
                </div>
            </div>
            <div class="hr-line-dashed"></div>