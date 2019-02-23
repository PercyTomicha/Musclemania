    <?php
        session_start();
        if(isset($_SESSION['contador'])==0){
            $_SESSION['contador']=0;
        }
        ++$_SESSION['contador'];
        echo "<a href=\"contador.php\">Has recargado esta Página ".$_SESSION['contador']." Veces</a>";
    ?>
            <div class="form-group">
                <?php echo Form::label('nombre','Nombre',['class'=>'col-sm-2 control-label']); ?>

                <div class="col-sm-8">
                    <?php echo Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ej. Peso 10kg - 20Kg Estatura 1.70 - 1.80','required']); ?>      
                </div>
            </div>
            <div class="hr-line-dashed"></div>