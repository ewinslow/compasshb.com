@extends('layouts.dashboard')

@section('content')
    <h1>Edit Sermon: {{ $sermon->title }}</h1>

    {!! Form::model($sermon, ['method' => 'PATCH', 'action' => ['SermonsController@update', $sermon->id]]) !!}
        @include('sermons.form', ['submitButtonText' => 'Update Sermon'])
    {!! Form::close() !!}

    @include('errors.list')

@endsection