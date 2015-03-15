@extends('layouts.dashboard')

@section('content')
	<h1>Create New Sermon</h1>

	@include('errors.list')

	{!! Form::open(['route' => 'sermons.store', 'files' => true]) !!}
		@include('sermons.form', ['submitButtonText' => 'Create Sermon'])
	{!! Form::close() !!}

@endsection
