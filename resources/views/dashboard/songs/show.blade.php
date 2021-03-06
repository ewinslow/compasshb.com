@extends('layouts.master')

@section('side')
    @include('layouts.side.resources')
@endsection

@section('content')

	<h1 class="tk-seravek-web">{{ $song->title }}</h1>

	<div class="videocontainer">
    {!! $song->iframe !!}
  </div>

  @if ($song->audio != '')
	<p><a href="{{ $song->audio }}" class="btn btn-default">Download MP3</a></p>
  @endif

  <div id="transcript">
    {!! $texttrack !!}
  </div>

  <br/><br/><p>{{ $song->excerpt }}</p>



  @unless($texttrack)
  <p>{!! $song->body !!}</p>
  @endunless

    @include('layouts.scripts-transcript')

@endsection
