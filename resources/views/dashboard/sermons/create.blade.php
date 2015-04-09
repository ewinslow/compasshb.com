@extends('layouts.dashboard.master')

@section('content')
	<h1>Create New Sermon</h1>

	@include('errors.list')

	{!! Form::model($sermon = new \CompassHB\Www\Sermon, ['url' => 'sermons', 'files' => true]) !!}
		@include('sermons.form', ['submitButtonText' => 'Create Sermon'])
	{!! Form::close() !!}

@endsection
