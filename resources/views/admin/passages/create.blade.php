@extends('layouts.master')

@section('side')
  @include('layouts.side.admin')
@endsection

@section('content')
	<h1>Create New Passage</h1>

	@include('errors.list')

	{!! Form::model($passage = new \CompassHB\Www\Passage, ['url' => 'read']) !!}
		@include('admin.passages.form', ['submitButtonText' => 'Create Passage'])
	{!! Form::close() !!}

@endsection
