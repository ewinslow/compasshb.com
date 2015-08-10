@extends('layouts.master')

@section('content')
	<h1>Create New Sermon/Lesson</h1>

	@include('errors.list')

	{!! Form::model($sermon = new \CompassHB\Www\Sermon, ['url' => 'sermons', 'files' => true]) !!}
		@include('admin.sermons.form', ['submitButtonText' => 'Create Sermon'])
	{!! Form::close() !!}

@endsection
