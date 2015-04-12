@extends('layouts.dashboard.master')

@section('content')
	<h1>Create New Sermon Series</h1>

	@include('errors.list')

	{!! Form::model($series = new \CompassHB\Www\Series, ['url' => 'series']) !!}
		@include('admin.series.form', ['submitButtonText' => 'Create Series'])
	{!! Form::close() !!}

@endsection
