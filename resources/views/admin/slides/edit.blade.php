@extends('layouts.dashboard')

@section('content')
    <h1 class="tk-seravek-web">Edit Slide: {{ $slide->title }}</h1>

    {!! Form::model($slide, ['method' => 'PATCH', 'action' => ['SlidesController@update', $slide->id]]) !!}
        @include('admin.slides.form', ['submitButtonText' => 'Update Slide'])
    {!! Form::close() !!}

    @include('errors.list')

@endsection
