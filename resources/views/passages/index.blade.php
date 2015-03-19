@extends('layouts.dashboard')

@section('content')
<link rel="canonical" href="http://www.compasshb.com/{{ route('read.show', $passages->first()->slug) }}/" />
<h1 class="tk-seravek-web">Scripture of the Day</h1>

<p>This page has been viewed by {{ $analytics['sessions'] }} people today spending an average {{ $analytics['avgSessionDuration'] }} minutes on page.</p>

  {!! $postflash !!}
  {!! $passage->body !!}
  {!! $passage->verses !!}

	@include('passages.comments');

@endsection


@section('sidebar')

  @include('passages.sidebar')

@endsection
