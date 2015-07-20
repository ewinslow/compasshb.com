@extends('layouts.dashboard.master')

@section('content')

	@if (empty($blog->video))
	<style>.videocontainer {display: none;}</style>
	@endif

	<h1 class="tk-seravek-web">{{ $blog->title }}</h1>
	<p>{{ $blog->byline }}</p>
	<div class="videocontainer">{!! $blog->iframe !!}</div>

  <p>{{ $texttrack }}</p>

  @unless($texttrack)
  <p>{!! $blog->body !!}</p>

  <p>Volunteer to transcribe or translate this <a href="http://transcribe.compasshb.com:8000">video here</a>.</p>

@endsection


@section('sidebar')

  @include('dashboard.blogs.sidebar')

@endsection
