@extends('layouts.dashboard')

@section('content')
    <h1>Edit Home Fellowship Group: {{ $fellowship->title }}</h1>

    {!! Form::model($fellowship, ['method' => 'PATCH', 'action' => ['FellowshipsController@update', $fellowship->id]]) !!}
        @include('fellowships.form', ['submitButtonText' => 'Update Home Fellowship Group'])
    {!! Form::close() !!}

    @include('errors.list')

@endsection