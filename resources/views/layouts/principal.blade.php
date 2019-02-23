<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Tecnología Web | GYM Musclemania</title>

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Mainly scripts -->

    <script src="{{asset('js/jquery-2.1.0.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{asset('js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <!-- Toastr style -->
    <link href="{{asset('css/plugins/toastr/toastr.min.css')}}" rel="stylesheet">

    <!-- Gritter -->
    <link href="{{asset('js/plugins/gritter/jquery.gritter.css')}}" rel="stylesheet">

    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    @if(Auth::user()->estilo==1)
        <link href="{{asset('css/style.css')}}" rel="stylesheet">
    @else
        @if(Auth::user()->estilo==2)
            <link href="{{asset('css/style1.css')}}" rel="stylesheet">
        @else
            <link href="{{asset('css/style2.css')}}" rel="stylesheet">
        @endif
    @endif

    <!--Extras-->
    <link href="{{asset('css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">

    <link href="{{asset('plugins/chosen/chosen.css')}}" rel="stylesheet">


    <!-- Flot -->
    <script src="{{asset('js/plugins/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('js/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{asset('js/plugins/flot/jquery.flot.spline.js')}}"></script>
    <script src="{{asset('js/plugins/flot/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('js/plugins/flot/jquery.flot.pie.js')}}"></script>

    <!-- Peity -->
    <script src="{{asset('js/plugins/peity/jquery.peity.min.js')}}"></script>
    <script src="{{asset('js/demo/peity-demo.js')}}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{asset('js/inspinia.js')}}"></script>
    <script src="{{asset('js/plugins/pace/pace.min.js')}}"></script>

    <!-- jQuery UI -->
    <script src="{{asset('js/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

    <!-- GITTER -->
    <script src="{{asset('js/plugins/gritter/jquery.gritter.min.js')}}"></script>

    <!-- Sparkline -->
    <script src="{{asset('js/plugins/sparkline/jquery.sparkline.min.js')}}"></script>

    <!-- Sparkline demo data  -->
    <script src="{{asset('js/demo/sparkline-demo.js')}}"></script>

    <!-- ChartJS-->
    <script src="{{asset('js/plugins/chartJs/Chart.min.js')}}"></script>

    <!-- Toastr -->
    <script src="{{asset('js/plugins/toastr/toastr.min.js')}}"></script>
    <!--Extras-->
    <script src="{{asset('js/plugins/dataTables/datatables.min.js')}}"></script>

    <!-- Steps -->
    <script src="{{asset('js/plugins/steps/jquery.steps.min.js')}}"></script>

    <!-- Jquery Validate -->
    <script src="{{asset('js/plugins/validate/jquery.validate.min.js')}}"></script>

    <script src="{{asset('js/dropdown.js')}}"></script>

    <script src="{{asset('plugins/chosen/chosen.jquery.js')}}"></script>

    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 10,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    {extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'Listado'},
                    {extend: 'pdf', title: 'Listado'},
                    {extend: 'print',
                    customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');
                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]
            });
        });
    </script>
</head>

<body classe="pace-done">
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div align="center" class="dropdown profile-element"> <span>
                            <center>
                                <img alt="image" class="img-circle" align="center" height="100" width="100" src="{{asset('images/logo.png')}}" />
                            </center>
                            </span>
                            <span class="clear"> <span style="color:whitesmoke" class="block m-t-xs"> <strong class="font-bold">GYM Musclemania</strong></span></span>
                            <a href="{{url('/cambiartema')}}"><span class="nav-label">Cambiar Tema</span>  </a>
                        </div>

                    </li>
                    <!--
                    <li class="active">
                        <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li class="active"><a href="index.html">Dashboard v.1</a></li>
                            <li><a href="#">Dashboard v.1</a></li>
                        </ul>
                    </li>
                    -->
                    @auth
                    @if(Auth::user()->tipo==1)
                    <li>
                        <a href="{{route('usuario.index')}}"><i class="fa fa-pie-chart"></i> <span class="nav-label">Gestionar Usuarios</span>  </a>
                    </li>
                    <li>
                        <a href="{{route('producto.index')}}"><i class="fa fa-pie-chart"></i> <span class="nav-label">Gestionar Productos</span>  </a>
                    </li>
                    <li>
                        <a href="{{route('venta.index')}}"><i class="fa fa-pie-chart"></i> <span class="nav-label">Gestionar Ventas</span>  </a>
                    </li>
                    <li>
                        <a href="{{route('asistencia.index')}}"><i class="fa fa-pie-chart"></i> <span class="nav-label">Gestionar Asistencias</span>  </a>
                    </li>
                    <li>
                        <a href="{{route('mensualidad.index')}}"><i class="fa fa-pie-chart"></i> <span class="nav-label">Gestionar Mensualidad</span>  </a>
                    </li>
                    <li>
                        <a href="{{route('alimentacion.index')}}"><i class="fa fa-pie-chart"></i> <span class="nav-label">Gestionar Alimentacion</span>  </a>
                    </li>
                    <li>
                        <a href="{{route('socio_rutina.index')}}"><i class="fa fa-pie-chart"></i> <span class="nav-label">Gestionar Rutinas de Socios</span>  </a>
                    </li>
                    <li>
                        <a href="{{route('estadistica.index')}}"><i class="fa fa-pie-chart"></i> <span class="nav-label">Gestionar Estadisticas</span>  </a>
                    </li>
                    @endif
                    @else
                    <li>
                        <a href="{{url('/')}}"><i class="fa fa-pie-chart"></i> <span class="nav-label">Inicia Sesion</span>  </a>
                    </li>
                    @endauth
                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>

                    </div>
                    @auth
                    <ul class="nav navbar-top-links navbar-right">

                        <li><a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out"></i>Cerrar Sesión</a>
                                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                        </li>
                    </ul>
                    @endauth
                </nav>
            </div>
            <div class="row  border-bottom white-bg dashboard-header">
                @include('flash::message')
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <p>Corrige los siguientes errores:</p>
                    <ul>
                        @foreach ($errors->all() as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                {!! csrf_field() !!}
                @yield('content')
                <!--
                    
                    Aqui va el Contenido

                -->
            </div>
        </div>
    </div>

</body>
@yield('Script')
<script>
    $("#estudiantes").chosen({});
    $('.select-estudiantes').chosen({});
</script>
</html>