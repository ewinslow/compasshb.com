@extends('layouts.master')

@section('side')
  @include('layouts.side.admin')
@endsection

@section('content')
	<h1>Create New Song</h1>

	@include('errors.list')

	{!! Form::model($song = new \CompassHB\Www\Song, ['url' => 'songs']) !!}
		@include('admin.songs.form', ['submitButtonText' => 'Create Song'])
	{!! Form::close() !!}

@endsection
