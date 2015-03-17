@extends('layouts.dashboard')

@section('content')
	<h1>Create New Passage</h1>

	@include('errors.list')

	{!! Form::model($passage = new \CompassHB\Www\Passage, ['url' => 'read']) !!}
		@include('passages.form', ['submitButtonText' => 'Create Passage'])
	{!! Form::close() !!}

@endsection
