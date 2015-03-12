@extends('layouts.dashboard')

@section('content')
	<h1>Create New Song</h1>

	{!! Form::open(['url' => 'songs']) !!}
		@include('songs.form', ['submitButtonText' => 'Create Song'])
	{!! Form::close() !!}

	@include('errors.list')

@endsection
