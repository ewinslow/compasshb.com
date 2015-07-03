@extends('layouts.dashboard.master')

@section('content')
<link rel="canonical" href="{{ route('read.show', $passage->slug) }}/" />

  <p>{!! $postflash !!}</p>

	<h1 class="tk-seravek-web">{{ $passage->title }}</h1><br/>

  {!! $passage->body !!}
  {!! $passage->verses !!}

<hr/>

<p>
  {{ Lang::choice('passages.daily_sessions_count', $analytics['sessions']) }}
  {{ Lang::choice('passages.active_users_count', $analytics['activeUsers']) }}
</p>

<audio src="{{ $passage->audio }}" controls="controls" ></audio><br/>

  <h5 class="tk-seravek-web">This Week</h5>
    <ul>
    @foreach ($passages as $p)
      <li><a href="{{ route('read.show', $p->slug) }}">{{ $p->title }}</a></li>
    @endforeach
    </ul>


	@include('dashboard.passages.comments')

@endsection


@section('sidebar')
@endsection
