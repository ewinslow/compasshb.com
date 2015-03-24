@extends('layouts.dashboard')

@section('content')
	<h1>Create New Slide</h1>

	@include('errors.list')

	{!! Form::model($slide = new \CompassHB\Www\Slide, ['url' => 'slides']) !!}
		@include('slides.form', ['submitButtonText' => 'Create Slide'])
	{!! Form::close() !!}

@endsection
