@extends('layouts.dashboard')

@section('content')
	<h1>Create New Blog</h1>

	@include('errors.list')

	{!! Form::open(['url' => 'blog']) !!}
		@include('blogs.form', ['submitButtonText' => 'Create Blog'])
	{!! Form::close() !!}

@endsection
