@extends('layouts.dashboard')

@section('content')
	<h1>Create New Home Fellowship Group</h1>

	{!! Form::open(['url' => 'fellowship']) !!}
		@include('fellowships.form', ['submitButtonText' => 'Create Home Fellowship Group'])
	{!! Form::close() !!}

	@include('errors.list')

@endsection