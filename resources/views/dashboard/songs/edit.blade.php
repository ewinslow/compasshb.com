@extends('layouts.dashboard.master')

@section('content')
    <h1>Edit Song: {{ $song->title }}</h1>

    {!! Form::model($song, ['method' => 'PATCH', 'action' => ['SongsController@update', $song->slug]]) !!}
        @include('dashboard.songs.form', ['submitButtonText' => 'Update Song'])
    {!! Form::close() !!}

    @include('errors.list')

@endsection
