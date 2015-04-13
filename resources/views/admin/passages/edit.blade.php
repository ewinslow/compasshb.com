@extends('layouts.dashboard.master')

@section('content')
    <h1>Edit Passage: {{ $passage->title }}</h1>

    {!! Form::model($passage, ['method' => 'PATCH', 'action' => ['PassagesController@update', $passage->slug]]) !!}
        @include('admin.passages.form', ['submitButtonText' => 'Update Passage'])
    {!! Form::close() !!}

    @include('errors.list')

@endsection
