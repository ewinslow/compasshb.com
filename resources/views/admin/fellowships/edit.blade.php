@extends('layouts.dashboard.master')

@section('content')
    <h1 class="tk-seravek-web">Edit Home Fellowship Group: {{ $fellowship->title }}</h1>

    {!! Form::model($fellowship, ['method' => 'PATCH', 'action' => ['FellowshipsController@update', $fellowship->slug]]) !!}
        @include('admin.fellowships.form', ['submitButtonText' => 'Update Home Fellowship Group'])
    {!! Form::close() !!}

    @include('errors.list')

@endsection
