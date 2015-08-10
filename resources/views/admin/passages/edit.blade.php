@extends('layouts.master')

@section('content')
    <h1 class="tk-seravek-web">Edit Passage: {{ $passage->title }}</h1>

    {!! Form::model($passage, ['method' => 'PATCH', 'action' => ['PassagesController@update', $passage->slug]]) !!}
        @include('admin.passages.form', ['submitButtonText' => 'Update Passage'])
    {!! Form::close() !!}

    @include('errors.list')

@endsection

@section('sidebar')

  @include('layouts.admin.sidebar')

@endsection