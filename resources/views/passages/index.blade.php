@extends('layouts.dashboard')

@section('content')
<link rel="canonical" href="http://www.compasshb.com/{{ route('read.show', $passages->first()->slug) }}/" />
<h1 class="tk-seravek-web">Scripture of the Day</h1>

<p>{{ $analytics['activeUsers'] }} active users. {{ $analytics['sessions'] }} people have read today. <!-- {{ $analytics['avgSessionDuration'] }} minutes average time reading.--></p>

  {!! $postflash !!}
  {!! $passage->body !!}
  {!! $passage->verses !!}

	@include('passages.comments');

@endsection


@section('sidebar')

  @include('passages.sidebar')

@endsection
