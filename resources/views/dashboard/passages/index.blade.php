@extends('layouts.dashboard.master')

@section('content')
<link rel="canonical" href="{{ URL::to('/') }}/{{ route('read.show', $passages->first()->slug) }}/" />
<h1 class="tk-seravek-web">Scripture of the Day</h1>

<p>{{ $analytics['activeUsers'] }} active users. {{ $analytics['sessions'] }} people have read today.</p>

  {!! $postflash !!}
  {!! $passage->body !!}
  {!! $passage->verses !!}

	@include('dashboard.passages.comments');

@endsection


@section('sidebar')

  @include('dashboard.passages.sidebar')

@endsection
