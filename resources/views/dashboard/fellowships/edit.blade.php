@extends('layouts.dashboard.master')

@section('content')
    <h1>Edit Home Fellowship Group: {{ $fellowship->title }}</h1>

    {!! Form::model($fellowship, ['method' => 'PATCH', 'action' => ['FellowshipsController@update', $fellowship->slug]]) !!}
        @include('dashboard.fellowships.form', ['submitButtonText' => 'Update Home Fellowship Group'])
    {!! Form::close() !!}

    @include('errors.list')

@endsection
