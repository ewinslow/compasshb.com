@extends('layouts.dashboard')

@section('content')
	<h1>Create New Song</h1>

	@include('errors.list')

	{!! Form::open(['url' => 'songs']) !!}
		@include('songs.form', ['submitButtonText' => 'Create Song'])
	{!! Form::close() !!}

@endsection
