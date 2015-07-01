@extends('layouts.dashboard.master')

@section('content')
<link rel="canonical" href="{{ route('read.show', $passages->first()->slug) }}/" />

  <p>{!! $postflash !!}</p>

	<h1 class="tk-seravek-web">{{ $passage->title }}</h1>

	<p>
  		{{ Lang::choice('passages.active_users_count', $analytics['activeUsers']) }}
  		{{ Lang::choice('passages.daily_sessions_count', $analytics['sessions']) }}
	</p>

  <audio src="{{ $passage->audio }}" controls="controls" ></audio><br/><br/>

  {!! $passage->body !!}
  {!! $passage->verses !!}

  <hr/>
  <h3>Related Sermons</h3>
  <?php dd($related); ?>
  <hr/>

	@include('dashboard.passages.comments')

@endsection


@section('sidebar')

  @include('dashboard.passages.sidebar')

@endsection
