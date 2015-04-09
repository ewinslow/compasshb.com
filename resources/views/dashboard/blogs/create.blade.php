@extends('layouts.dashboard.master')

@section('content')
	<h1>Create New Blog</h1>

	@include('errors.list')

	{!! Form::model($blog = new \CompassHB\Www\Blog, ['url' => 'blog']) !!}
		@include('blogs.form', ['submitButtonText' => 'Create Blog'])
	{!! Form::close() !!}

@endsection
