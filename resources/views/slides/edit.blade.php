@extends('layouts.dashboard')

@section('content')
    <h1>Edit Slide: {{ $slide->title }}</h1>

    {!! Form::model($slide, ['method' => 'PATCH', 'action' => ['SlidesController@update', $slide->id]]) !!}
        @include('slides.form', ['submitButtonText' => 'Update Slide'])
    {!! Form::close() !!}

    @include('errors.list')

@endsection
