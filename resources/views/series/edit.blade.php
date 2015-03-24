@extends('layouts.dashboard')

@section('content')
    <h1>Edit Series: {{ $series->title }}</h1>

    {!! Form::model($series, ['method' => 'PATCH', 'action' => ['SeriesController@update', $series->slug]]) !!}
        @include('series.form', ['submitButtonText' => 'Update Series'])
    {!! Form::close() !!}

    @include('errors.list')

@endsection
