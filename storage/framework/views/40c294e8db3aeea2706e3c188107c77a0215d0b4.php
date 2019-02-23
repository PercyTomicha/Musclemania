<?php $__env->startSection('content'); ?>
    <?php
        session_start();
        $con=$_SESSION['alicontador']+$_SESSION['asicontador']+$_SESSION['mencontador']+$_SESSION['procontador']+$_SESSION['soccontador']+$_SESSION['usecontador']+$_SESSION['vencontador'];
        $c1=($_SESSION['alicontador']/$con)*100;
        $c2=($_SESSION['asicontador']/$con)*100;
        $c3=($_SESSION['mencontador']/$con)*100;
        $c4=($_SESSION['procontador']/$con)*100;
        $c5=($_SESSION['soccontador']/$con)*100;
        $c6=($_SESSION['usecontador']/$con)*100;
        $c7=($_SESSION['vencontador']/$con)*100;
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