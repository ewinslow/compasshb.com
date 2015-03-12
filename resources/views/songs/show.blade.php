@extends('layouts.dashboard')

@section('content')

	<h1 class="tk-seravek-web">{{ $song->title }}</h1>

	<div class="videocontainer">
    {!! $song->iframe !!}
  </div>

	<p>{{ $song->body }}</p>

@endsection
