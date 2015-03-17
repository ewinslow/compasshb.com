@extends('layouts.dashboard')

@section('content')
    <h1>Edit Sermon: {{ $sermon->title }}</h1>

    {!! Form::model($sermon, ['method' => 'PATCH', 'route' => ['sermons.update', $sermon->slug], 'files' => true]) !!}
        @include('sermons.form', ['submitButtonText' => 'Update Sermon'])
    {!! Form::close() !!}

    @include('errors.list')

@endsection
