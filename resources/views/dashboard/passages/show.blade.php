@extends('layouts.dashboard.master')

@section('content')

	<h1 class="tk-seravek-web">Scripture of the Day</h1>

	<p>{{ $analytics['sessions'] }} people read this chapter.</p>

  {!! $postflash !!}
  {!! $passage->body !!}
  {!! $passage->verses !!}

  	@include('dashboard.passages.scripts')

	@include('dashboard.passages.comments')

@endsection


@section('sidebar')

  @include('dashboard.passages.sidebar')

@endsection
