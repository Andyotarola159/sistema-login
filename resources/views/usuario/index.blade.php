@extends('layoust.principal')
@section('title')
Registro
@endsection
@section('content')

@if(Session::has('eliminar'))

	<div class="success callout" data-closable="slide-out-right">
	  <p>{!!Session::get('eliminar')!!}</p>
	  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    	<span aria-hidden="true">&times;</span>
	  </button>
	</div>

@endif

@if(count($errors)>0)
	
	<div class="success callout" data-closable="slide-out-right">
	  <ul>
	  @foreach($errors->all() as $error)
	  	<li>{{$error}}</li>
	  	@endforeach
	  </ul>
	  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
		<span aria-hidden="true">&times;</span>
	  </button>
	</div>

@endif


  <div class="row">
  	{!!Form::open(['route'=>'usuario.store'])!!}

    @include('formulario.form')
  	{!!Form::submit('Registrar',['class'=>'button'])!!}

  	{!!Form::close()!!}
  </div>

  <div class="row">
  	{!!Form::open(['route'=>'log.store'])!!}

	{!!Form::label('email','E:mail')!!}	
	{!!Form::email('email')!!}

	{!!Form::label('password','Contraseña')!!}	
	{!!Form::password('password')!!}

	{!!Form::submit('Iniciar Sesion',['class'=>'button'])!!}
  	{!!Form::close()!!}
  </div>

@stop