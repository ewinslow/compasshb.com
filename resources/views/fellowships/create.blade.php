@extends('layouts.dashboard')

@section('content')
	<h1>Create New Home Fellowship Group</h1>

	@include('errors.list')

	{!! Form::open(['url' => 'fellowship']) !!}
		@include('fellowships.form', ['submitButtonText' => 'Create Home Fellowship Group'])
	{!! Form::close() !!}

@endsection
