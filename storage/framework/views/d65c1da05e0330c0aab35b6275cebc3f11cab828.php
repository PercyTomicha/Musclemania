<?php $__env->startSection('content'); ?>
    <?php
        session_start();
        if(isset($_SESSION['mencontador'])==0){
            $_SESSION['mencontador']=0;
        }
        ++$_SESSION['mencontador'];
        echo "<p style=".'"'."color:red".'"'."href=\"mencontador.php\">Has recargado esta Página ".$_SESSION['mencontador']." Veces</p>";
    ?>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Lista de Mensualidades</h2>
            <ol class="breadcrumb">
                <li><a href="/index">Inicio</a></li>
                <li class="active"><strong>Listado de Mensualidades</strong></li>
            </ol>
        </div>
    </div>
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <a href="<?php echo e(route('mensualidad.create')); ?>" class="btn btn-w-m btn-primary"><i class="fa fa-plus"></i> Agregar Nueva <strong>Mensualidad</strong></a>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <!--<th style="width: 64px;">Nombre</th>-->
                                        <th>Fecha Inicio</th>
                                        <th>Fecha Final</th>
                                        <th>Instructor</th>
                                        <th>Promoción</th>
                                        <th>Monto</th>
                                        <?php if(Auth::user()->tipo==1): ?>
                                            <th>Acción</th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <?php $sum=0 ?>
                                <tbody>
                                <?php $i=1 ?>
                                <?php $__currentLoopData = $mensualidades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="gradeX">
                                        <td><?php echo e($i); ?></td>
                                        <td><?php echo e($m->fecha_inicio); ?></td>
                                        <td><?php echo e($m->fecha_fin); ?></td>
                                        <td><?php echo e($m->UN); ?> <?php echo e($m->UA); ?></td>
                                        <td><?php echo e($m->PD); ?></td>
                                        <?php $sum=$sum+($m->monto) ?>
                                        <td><?php echo e($m->monto); ?> Bs.</td>
                                        <?php if(Auth::user()->tipo==1): ?>
                                        <td>
                                            <a class="btn btn-w-m btn-info" href="<?php echo e(route('mensualidad.edit',$m->id)); ?>"><i class="fa fa-edit"></i> Editar</a>
                                            <?php echo Form::open(['method' => 'DELETE','route' => ['mensualidad.destroy', $m->id],'style'=>'display:inline']); ?>

                                                <?php echo Form::button('<i class="fa fa-trash-o"></i> Eliminar', ['type' => 'submit', 'class' => 'btn btn-w-m btn-danger'] ); ?>

                                            <?php echo Form::close(); ?>

                                        </td>
                                        <?php else: ?>
                                        <td style="display: none">
                                            <a class="btn btn-w-m btn-info" href="<?php echo e(route('mensualidad.edit',$m->id)); ?>"><i class="fa fa-edit"></i> Editar</a>
                                            <?php echo Form::open(['method' => 'DELETE','route' => ['mensualidad.destroy', $m->id],'style'=>'display:inline']); ?>

                                                <?php echo Form::button('<i class="fa fa-trash-o"></i> Eliminar', ['type' => 'submit', 'class' => 'btn btn-w-m btn-danger'] ); ?>

                                            <?php echo Form::close(); ?>

                                        </td>
                                        <?php endif; ?>
                                        <?php $i=$i+1 ?>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th>Total de Mensualidades</th>
                                        <th><?php echo e($sum); ?> Bs.</th>
                                        <?php if(Auth::user()->tipo==1): ?>
                                            <th></th>
                                        <?php endif; ?>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Fecha Inicio</th>
                                        <th>Fecha Final</th>
                                        <th>Instructor</th>
                                        <th>Promoción</th>
                                        <th>Monto</th>
                                        <?php if(Auth::user()->tipo==1): ?>
                                            <th>Acción</th>
                                        <?php endif; ?>
                                    </tr>
                                    <!--
                                    <tr>
                                        <th>Rendering engine</th>
                                        <th>Browser</th>
                                        <th>Platform(s)</th>
                                        <th>Engine version</th>
                                        <th>CSS grade</th>
                                    </tr>
                                    -->
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.principal', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>