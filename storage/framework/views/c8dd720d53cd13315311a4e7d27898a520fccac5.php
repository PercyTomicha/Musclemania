<?php $__env->startSection('content'); ?>
    <?php
        session_start();
        if(isset($_SESSION['usecontador'])==0){
            $_SESSION['usecontador']=0;
        }
        ++$_SESSION['usecontador'];
        echo "<p style=".'"'."color:red".'"'."href=\"usecontador.php\">Has recargado esta Página ".$_SESSION['usecontador']." Veces</p>";
    ?>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Lista de Usuarios</h2>
            <ol class="breadcrumb">
                <li><a href="/index">Inicio</a></li>
                <li class="active"><strong>Listado de Usuarios</strong></li>
            </ol>
        </div>
    </div>
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <a href="<?php echo e(route('usuario.create')); ?>" class="btn btn-w-m btn-primary"><i class="fa fa-plus"></i> Agregar Nuevo <strong>Usuario</strong></a>
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
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Telefono</th>
                                        <th>Fecha de Nacimiento</th>
                                        <th>Correo Electrónico</th>
                                        <th>Tipo</th>
                                        <th>Estado</th>
                                        <?php if(Auth::user()->tipo==1): ?>
                                            <th>Acción</th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i=1 ?>
                                <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="gradeX">
                                        <td><?php echo e($i); ?></td>
                                        <td><?php echo e($u->nombres); ?></td>
                                        <td><?php echo e($u->apellidos); ?></td>
                                        <td><?php echo e($u->telefono); ?></td>
                                        <td><?php echo e($u->fecha_nacimiento); ?></td>
                                        <td><?php echo e($u->email); ?></td>
                                        <?php if($u->tipo==1): ?>
                                        	<td style="color:green;"><strong>Administrador</strong></td>
                                        <?php else: ?>
                                        	<?php if($u->tipo==2): ?>
                                        		<td><strong>Socio</strong></td>
                                        	<?php else: ?>
                                            	<td style="color:blue;"><strong>Instructor</strong></td>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if($u->estado==1): ?>
                                        	<td style="color:green;"><strong>Activo</strong></td>
                                        <?php else: ?>
                                        	<td style="color:red;"><strong>Inactivo</strong></td>
                                        <?php endif; ?>
                                        <?php if(Auth::user()->tipo==1): ?>
                                        <td>
                                            <a class="btn btn-w-m btn-info" href="<?php echo e(route('usuario.edit',$u->id)); ?>"><i class="fa fa-edit"></i> Editar</a>
                                            <?php echo Form::open(['method' => 'DELETE','route' => ['usuario.destroy', $u->id],'style'=>'display:inline']); ?>

                                                <?php echo Form::button('<i class="fa fa-trash-o"></i> Eliminar', ['type' => 'submit', 'class' => 'btn btn-w-m btn-danger'] ); ?>

                                            <?php echo Form::close(); ?>

                                        </td>
                                        <?php else: ?>
                                        <td style="display: none">
                                            <a class="btn btn-w-m btn-info" href="<?php echo e(route('usuario.edit',$u->id)); ?>"><i class="fa fa-edit"></i> Editar</a>
                                            <?php echo Form::open(['method' => 'DELETE','route' => ['usuario.destroy', $u->id],'style'=>'display:inline']); ?>

                                                <?php echo Form::button('<i class="fa fa-trash-o"></i> Eliminar', ['type' => 'submit', 'class' => 'btn btn-w-m btn-danger'] ); ?>

                                            <?php echo Form::close(); ?>

                                        </td>
                                        <?php endif; ?>
                                        <?php $i=$i+1 ?>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Telefono</th>
                                        <th>Fecha de Nacimiento</th>
                                        <th>Correo Electrónico</th>
                                        <th>Tipo</th>
                                        <th>Estado</th>
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