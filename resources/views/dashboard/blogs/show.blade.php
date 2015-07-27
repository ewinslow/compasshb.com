@extends('layouts.dashboard.master')

@section('content')

	@if (empty($blog->video))
	<style>.videocontainer {display: none;}</style>
	@endif

	<h1 class="tk-seravek-web">{{ $blog->title }}</h1>
	<p>{{ $blog->byline }}</p>
	<div class="videocontainer">{!! $blog->iframe !!}</div>

  @if ($blog->video)
    <form action="https://transcribe.compasshb.com/en/videos/create/" method="POST">
      <input type="hidden" name="video_url" value="{{ $blog->video }}"/>
      <p style="float: right"><input type="submit" value="Transcribe" class="btn btn-default"/></p>
    </form>
  @endif

  <div id="transcript">
    {!! $texttrack !!}
  </div>

  @unless($texttrack)
  <p>{!! $blog->body !!}</p>
  @endunless

  @include('layouts.scripts-transcript')

@endsection
