

<?php $__env->startSection('content'); ?>
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">

                    <div class="ibox-content">

                        <h2 align="middle"><strong>Gimnasio Musclemania</strong></h2>
                        <p align="middle">
                            El <strong>Gimnasio Musclemania</strong>, es el Lugar Perfecto para iniciar tu vida Fitness.
                        </p>

                        <div class="lightBoxGallery">
                            <a href="" title="Image from Unsplash" data-gallery=""><img src="<?php echo e(asset('images/Musclemania.PNG')); ?>"></a>
                        </div>
                        <!--
                        <p align="lefth">Los objetivos del ICAP son:</p>
                        <p align="lefth">a)	Contribuir al desarrollo comunitario productivo y social, para el mejoramiento de la capacidad productiva de la región.</p>
                        <p align="lefth">b)	Difundir conocimiento técnico, preferentemente a los trabajadores y estudiantes de sectores populares, para ayudar abrir o ampliar el rango de oportunidades que tienden a mejorar las condiciones socioeconómicas de vida de los ciudadanos.</p>
                        <p align="lefth">c)	Capacitar con cursos medianos y cortos a grupos humanos urbano-provincial preferentemente del sector popular, obrero, indígena, campesino y población general de escasos recursos.</p>
                        -->
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.principal', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>