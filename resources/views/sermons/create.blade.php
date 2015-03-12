@extends('layouts.dashboard')

@section('content')
	<h1>Create New Sermon</h1>

	{!! Form::open(['url' => 'sermons']) !!}
		@include('sermons.form', ['submitButtonText' => 'Create Sermon'])
	{!! Form::close() !!}

	@include('errors.list')

@endsection
