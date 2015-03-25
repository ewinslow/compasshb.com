@extends('layouts.dashboard')

@section('content')

	<h1 class="tk-seravek-web">{{ $blog->title }}</h1>
	<p>{{ $blog->byline }}</p>
	<p>{!! $blog->iframe !!}</p>
  <p>{!! $blog->body !!}</p>

@endsection


@section('sidebar')

  @include('blogs.sidebar')

@endsection
