@extends('layouts.dashboard')

@section('content')
	<h1>Create New Sermon</h1>

	@include('errors.list')

	{!! Form::model($sermon = new \CompassHB\Www\Sermon, ['url' => 'sermons']) !!}
		@include('sermons.form', ['submitButtonText' => 'Create Sermon'])
	{!! Form::close() !!}

@endsection
