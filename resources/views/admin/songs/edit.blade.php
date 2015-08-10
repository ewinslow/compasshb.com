@extends('layouts.master')

@section('content')
    <h1 class="tk-seravek-web">Edit Song: {{ $song->title }}</h1>

    {!! Form::model($song, ['method' => 'PATCH', 'action' => ['SongsController@update', $song->slug]]) !!}
        @include('admin.songs.form', ['submitButtonText' => 'Update Song'])
    {!! Form::close() !!}

    @include('errors.list')

@endsection

@section('sidebar')

  @include('layouts.admin.sidebar')

@endsection