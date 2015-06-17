@extends('layouts.dashboard.master')

@section('content')
<link rel="canonical" href="{{ route('read.show', $passages->first()->slug) }}/" />
<h1 class="tk-seravek-web">{{ $passage->title }}</h1>


<p>
  {{ Lang::choice('passages.active_users_count', $analytics['activeUsers']) }}
  {{ Lang::choice('passages.daily_sessions_count', $analytics['sessions']) }}
</p>

  {!! $postflash !!}
<audio src="{{ $passage->audio }}" controls="controls" />
  {!! $passage->body !!}
  {!! $passage->verses !!}

  @include('dashboard.passages.scripts')

	@include('dashboard.passages.comments')

@endsection


@section('sidebar')

  @include('dashboard.passages.sidebar')

@endsection
