@extends('layouts.dashboard')

@section('content')
    <h1>Edit Blog: {{ $blog->title }}</h1>

    {!! Form::model($blog, ['method' => 'PATCH', 'action' => ['BlogsController@update', $blog->id]]) !!}
        @include('blogs.form', ['submitButtonText' => 'Update Blog'])
    {!! Form::close() !!}

    @include('errors.list')

@endsection
