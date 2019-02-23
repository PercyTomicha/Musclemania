<?php $__env->startSection('content'); ?>
    <?php
        session_start();
        $con=0;$c1=0;$c2=0;$c3=0;$c4=0;$c5=0;$c6=0;$c7=0;
        if(isset($_SESSION['alicontador'])==0){
            $_SESSION['alicontador']=0;
        }
        if(isset($_SESSION['asicontador'])==0){
            $_SESSION['asicontador']=0;
        }
        if(isset($_SESSION['mencontador'])==0){
            $_SESSION['mencontador']=0;
        }
        if(isset($_SESSION['procontador'])==0){
            $_SESSION['procontador']=0;
        }
        if(isset($_SESSION['soccontador'])==0){
            $_SESSION['soccontador']=0;
        }
        if(isset($_SESSION['usecontador'])==0){
            $_SESSION['usecontador']=0;
        }
        if(isset($_SESSION['vencontador'])==0){
            $_SESSION['vencontador']=0;
        }
        $c1=$_SESSION['alicontador'];
        $c2=$_SESSION['asicontador'];
        $c3=$_SESSION['mencontador'];
        $c4=$_SESSION['procontador'];
        $c5=$_SESSION['soccontador'];
        $c6=$_SESSION['usecontador'];
        $c7=$_SESSION['vencontador'];
        $con=$c1+$c2+$c3+$c4+$c5+$c6+$c7;
        if($con!=0){
            $c1=($c1/$con)*100;
            $c2=($c2/$con)*100;
            $c3=($c3/$con)*100;
            $c4=($c4/$con)*100;
            $c5=($c5/$con)*100;
            $c6=($c6/$con)*100;
            $c7=($c7/$con)*100;
        }
    ?>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Estadísticas de Visitas</h2>
            <ol class="breadcrumb">
                <li><a href="/index">Inicio</a></li>
                <li class="active"><strong>Estadísticas de Visitas</strong></li>
            </ol>
        </div>
        <div class="ibox-content">
            <p>Visitas al Gestión de Usuarios <strong><?php echo $c1."%";?></strong></p>
            <div class="progress">
                <div style="width: <?php echo $c1;?>%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="35" role="progressbar" class="progress-bar progress-bar-success">
                </div>
            </div>
        </div>
        <div class="ibox-content">
            <p>Visitas al Gestión de Productos <strong><?php echo $c2."%";?></strong></p>
            <div class="progress">
                <div style="width: <?php echo $c2;?>%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="35" role="progressbar" class="progress-bar progress-bar-success">
                </div>
            </div>
        </div>
        <div class="ibox-content">
            <p>Visitas al Gestión de Ventas <strong><?php echo $c3."%";?></strong></p>
            <div class="progress">
                <div style="width: <?php echo $c3;?>%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="35" role="progressbar" class="progress-bar progress-bar-success">
                </div>
            </div>
        </div>
        <div class="ibox-content">
            <p>Visitas al Gestión de Asistencias <strong><?php echo $c4."%";?></strong></p>
            <div class="progress">
                <div style="width: <?php echo $c4;?>%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="35" role="progressbar" class="progress-bar progress-bar-success">
                </div>
            </div>
        </div>
        <div class="ibox-content">
            <p>Visitas al Gestión de Mensualidades <strong><?php echo $c5."%";?></strong></p>
            <div class="progress">
                <div style="width: <?php echo $c5;?>%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="35" role="progressbar" class="progress-bar progress-bar-success">
                </div>
            </div>
        </div>
        <div class="ibox-content">
            <p>Visitas al Gestión de Alimentaciones <strong><?php echo $c6."%";?></strong></p>
            <div class="progress">
                <div style="width: <?php echo $c6;?>%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="35" role="progressbar" class="progress-bar progress-bar-success">
                </div>
            </div>
        </div>
        <div class="ibox-content">
            <p>Visitas al Gestión de Rutinas de Socios <strong><?php echo $c7."%";?></strong></p>
            <div class="progress">
                <div style="width: <?php echo $c7;?>%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="35" role="progressbar" class="progress-bar progress-bar-success">
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.principal', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>