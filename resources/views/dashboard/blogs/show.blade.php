@extends('layouts.dashboard.master')

@section('content')

	@if (empty($blog->video))
	<style>.videocontainer {display: none;}</style>
	@endif

	<h1 class="tk-seravek-web">{{ $blog->title }}</h1>
	<p>{{ $blog->byline }}</p>
	<div class="videocontainer">{!! $blog->iframe !!}</div>


  @if ($blog->video)
    <br/><hr/>
    <h3>Subtitles and Transcripts</h3>
    <p>Select lanaguage:
    @foreach ($languages as $language)
      <a href="/blog/{{ $blog->slug }}/{{ $language }}">{{ $language }}</a>,
    @endforeach
    </p>
    <hr/>
  @endif

  <div id="transcript">
    {!! $texttrack !!}
  </div>

  @unless($texttrack)
  <p>{!! $blog->body !!}</p>
  @endunless

<br/>
  @if ($blog->video)
    <br/><hr/><p>Click the button below to contribute a transcription or translation of this video. You will need to create a free account.</p>
    <form action="https://transcribe.compasshb.com/en/videos/create/" method="POST">
      <input type="hidden" name="video_url" value="{{ $blog->video }}"/>
      <input type="submit" value="Transcribe/Translate" class="btn btn-default"/>
    </form>
  @endif
<br/><br/>
  @include('layouts.scripts-transcript')

@endsection
