@extends('layouts.dashboard.master')

@section('content')
	<h1>Create New Home Fellowship Group</h1>

	@include('errors.list')

	{!! Form::model($fellowship = new \CompassHB\Www\fellowship, ['url' => 'fellowship']) !!}
		@include('dashboard.fellowships.form', ['submitButtonText' => 'Create Home Fellowship Group'])
	{!! Form::close() !!}

@endsection
