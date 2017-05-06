@extends('layoust.principal')
@section('title')
Editar
@endsection
@section('content')

	{!!Form::model($user,['route'=>['usuario.update',$user->id],'method'=>'PUT'])!!}

		@include('formulario.form')
	{!!Form::submit('Actualizar',['class'=>'button'])!!}

	{!!Form::close()!!}

	{!!Form::open(['route'=>['usuario.destroy',$user->id],'method'=>'DELETE'])!!}
		{!!Form::submit('borrar',['class'=>'button alert'])!!}
	{!!Form::close()!!}

@stop