@extends('layouts.dashboard.master')

@section('content')

	<h1 class="tk-seravek-web">Sermon Series</h1><br/>

  @foreach ($series as $item)
  <div class="col-md-4">
    <a href="{{ route('series.show', $item->slug) }}">
      <img src="{{ $item->image }}" alt="{{ $item->title }}" width="300"/><br/>
      <h4 class="tk-seravek-web">{{ $item->title }}</h4></a>
      <p>{{ $item->body }}</p>
    </a>
  </div>
  @endforeach

@endsection
