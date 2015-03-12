@extends('layouts.dashboard')

@section('content')
	<h1>Create New Passage</h1>

	{!! Form::open(['url' => 'read']) !!}
		@include('passages.form', ['submitButtonText' => 'Create Passage'])
	{!! Form::close() !!}

	@include('errors.list')

@endsection
