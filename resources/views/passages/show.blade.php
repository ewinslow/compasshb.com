@extends('layouts.dashboard')

@section('content')

	<h1 class="tk-seravek-web">Scripture of the Day</h1>

	<p>{{ $analytics['sessions'] }} people read this chapter.</p>

  {!! $postflash !!}
  {!! $passage->body !!}
  {!! $passage->verses !!}

	@include('passages.comments');

@endsection


@section('sidebar')

  @include('passages.sidebar')

@endsection
