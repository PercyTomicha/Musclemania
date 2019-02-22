@extends('layouts.layoutAuth')
@section('content')
    <div>
        <center><strong><h1 style="color:white">Musclemania</h1></strong></center>
    </div>
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <h3 style="color:white">Bienvenidos</h3>
            <p style="color:white"><i>"El dolor es temporal, el orgullo para siempre"</i></p>
            <p style="color:white">Inicia Sesion para seguir trabajando</p>
            <form class="m-t" role="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input id="email" type="email" class="form-control" name="email" placeholder="Código" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input id="password" type="password" class="form-control" name="password" placeholder="Contraseña" value="{{ old('password') }}" required autofocus>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Iniciar Sesión</button>
                <a class="btn btn-link" href="{{ url('/password/reset') }}"><small>¿Olvidaste tu Contraseña?</small></a>
                <!--
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                -->
                <!--<a class="btn btn-sm btn-white btn-block" href="{{ url('/register') }}">Crea una Cuenta</a>-->
            </form>
            <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
        </div>
    </div>
@stop