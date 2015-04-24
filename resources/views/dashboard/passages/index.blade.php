@extends('layouts.dashboard.master')

@section('content')
<link rel="canonical" href="{{ route('read.show', $passages->first()->slug) }}/" />
<h1 class="tk-seravek-web">Scripture of the Day</h1>


<p>
  {{ Lang::choice('passages.active_users_count', $analytics['activeUsers']) }}
  {{ Lang::choice('passages.daily_sessions_count', $analytics['sessions']) }}
</p>

  {!! $postflash !!}
  {!! $passage->body !!}
  {!! $passage->verses !!}

	@include('dashboard.passages.comments')

@endsection


@section('sidebar')

  @include('dashboard.passages.sidebar')

@endsection
