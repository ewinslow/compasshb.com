@extends('layouts.dashboard.master')

@section('content')
    <h1>Edit Sermon: {{ $sermon->title }}</h1>

    {!! Form::model($sermon, ['method' => 'PATCH', 'route' => ['sermons.update', $sermon->slug], 'files' => true]) !!}
        @include('admin.sermons.form', ['submitButtonText' => 'Update Sermon'])
    {!! Form::close() !!}

    @include('errors.list')

@endsection
