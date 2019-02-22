@extends('layouts.layoutAuth')
@section('content')
    <div>
        <center><strong><h1 style="color:white">Musclemania</h1></strong></center>
    </div>
<div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <h3 style="color:white">Registrate para Comenzar</h3>
			<p style="color:white">Rellena todos los Campos</p>
			<form class="m-t" role="form" method="POST" action="{{ url('/register') }}">
                {{ csrf_field() }}
				<div class="form-group{{ $errors->has('nombres') ? ' has-error' : '' }}">
					<input id="nombres" type="text" class="form-control" name="nombres" value="{{ old('nombres') }}" placeholder="Nombres" required autofocus>
					@if ($errors->has('nombres'))
						<span class="help-block">
							<strong>{{ $errors->first('nombres') }}</strong>
						</span>
					@endif
				</div>
				<div class="form-group{{ $errors->has('apellidos') ? ' has-error' : '' }}">
					<input id="apellidos" type="text" class="form-control" name="apellidos" value="{{ old('apellidos') }}" placeholder="Apellidos" required autofocus>
					@if ($errors->has('apellidos'))
						<span class="help-block">
							<strong>{{ $errors->first('apellidos') }}</strong>
						</span>
					@endif
				</div>
				<div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
					<input id="telefono" type="text" class="form-control" name="telefono" value="{{ old('telefono') }}" placeholder="Telefono" required autofocus>
					@if ($errors->has('telefono'))
						<span class="help-block">
							<strong>{{ $errors->first('telefono') }}</strong>
						</span>
					@endif
				</div>
				<div class="form-group{{ $errors->has('fecha_nacimiento') ? ' has-error' : '' }}">
                    {!!Form::date('fecha_nacimiento',\Carbon\Carbon::now(),['class'=>'form-control','placeholder'=>'Seleccione una Fecha','required'])!!}
					@if ($errors->has('fecha_nacimiento'))
						<span class="help-block">
							<strong>{{ $errors->first('fecha_nacimiento') }}</strong>
						</span>
					@endif
				</div>
				<div class="form-group{{ $errors->has('tipo') ? ' has-error' : '' }}">
                    {!!Form::select('tipo', ['1' => 'Administrador', '2' => 'Socio', '3' => 'Instructor'], null, ['class'=>'form-control','placeholder' => 'Seleccione el Tipo de Usuario...','required'])!!}
					@if ($errors->has('tipo'))
						<span class="help-block">
							<strong>{{ $errors->first('tipo') }}</strong>
						</span>
					@endif
				</div>
				<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
					<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Correo Electrónico" required autofocus>
					@if ($errors->has('email'))
						<span class="help-block">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
					@endif
				</div>
				<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
					<input id="password" type="password" class="form-control" name="password" placeholder="Contraseña" required>
					@if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
				</div>
				<div class="form-group">
					<input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmar Contraseña" required>
				</div>
				            
				<div class="form-group">
					<div class="checkbox i-checks"><label style="color:white"> <input type="checkbox" required><i></i>Acordar los términos y la política. </label></div>
				</div>
				<button type="submit" class="btn btn-primary block full-width m-b">Registrar</button>
				<a class="btn btn-sm btn-white btn-block" href="{{ url('/login') }}">Iniciar Sesión</a>
			</form>
			<p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
        </div>
    </div>
@stop