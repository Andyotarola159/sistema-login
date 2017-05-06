@extends('layoust.principal')
@section('title')
Registrados
@endsection
@section('content')

@if(Session::has('registrado'))

	<div class="success callout" data-closable="slide-out-right">
	  <p>{!!Session::get('registrado')!!}</p>
	  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    	<span aria-hidden="true">&times;</span>
	  </button>
	</div>

@endif


@if(Session::has('actualizar'))

	<div class="success callout" data-closable="slide-out-right">
	  <p>{!!Session::get('actualizar')!!}</p>
	  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    	<span aria-hidden="true">&times;</span>
	  </button>
	</div>

@endif


@if(count($errors)>0)
<div class="row">

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
	
</div>
@endif

<?php 
	
	use \App\Imagen;

	$imagen=Imagen::find($users->id);
 
?>

<div class="row">
	@if(empty($imagen))
		<img src="{{asset('imagenes/login.png')}}">

	@else
		<img src="http://localhost/Login/public/imagenes/{{$imagen->foto}}">
	@endif

	<p>{{$users->name}}</p>

</div>
<div class="row">
	<div class="column small-6">
		{!!link_to_route('usuario.edit',$title='Editar',$parameters=$users->id,$attributes=['class'=>'button'])!!}
	</div>

	<div class="column small-6">
		{!!link_to_action('LogController@index',$title='Cerrar sesion',$parameters=[],$attributes=['class'=>'button'])!!}
	</div>

</div>
	
	
	<div class="row">
		{!!Form::open(['route'=>['imagen.update',$users->id],'method'=>'PUT','files'=>true])!!}

		{{csrf_field()}}

		{!!Form::file('foto')!!}

		{!!Form::submit('Subir',['class'=>'button'])!!}
		{!!Form::close()!!}
	</div>

	<div class="row">
		{!!Form::open(['route'=>['video.update',$users->id],'method'=>'PUT','files'=>true])!!}

		{{csrf_field()}}

		{!!Form::file('video')!!}

		{!!Form::submit('Subir Video',['class'=>'button'])!!}
		{!!Form::close()!!}
	</div>

	<?php 
	
		use \App\Video;

		$video=Video::find($users->id);
 
	?>


	<div class="row">
	@if(empty($video))
		

	@else
		<video src="http://localhost/Login/public/imagenes/{{$video->video}}" controls>
		</video>
	@endif


</div>

@stop