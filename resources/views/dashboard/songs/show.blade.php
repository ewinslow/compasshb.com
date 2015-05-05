@extends('layouts.dashboard.master')

@section('content')

	<h1 class="tk-seravek-web">{{ $song->title }}</h1>

	<div class="videocontainer">
    {!! $song->iframe !!}
  </div>

  @if ($song->audio != '')
	<p><a href="{{ $song->audio }}" class="btn btn-default">Download MP3</a></p>
  @endif

  <p>{!! $song->body !!}</p>

@endsection
