@extends('layouts.dashboard.master')

@section('content')

  <p>{!! $postflash !!}</p>

	<h1 class="tk-seravek-web">{{ $passage->title }}</h1>

	<p>{{ $analytics['sessions'] }} people read this chapter.</p>

<audio src="{{ $passage->audio }}" controls="controls" ></audio>
  {!! $passage->body !!}
  {!! $passage->verses !!}

	@include('dashboard.passages.comments')

@endsection


@section('sidebar')

  @include('dashboard.passages.sidebar')

@endsection
