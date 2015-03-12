@extends('layouts.dashboard')

@section('content')
	<h1>Create New Blog</h1>

	{!! Form::open(['url' => 'blog']) !!}
		@include('blogs.form', ['submitButtonText' => 'Create Blog'])
	{!! Form::close() !!}

	@include('errors.list')

@endsection