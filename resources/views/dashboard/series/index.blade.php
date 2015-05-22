@extends('layouts.dashboard.master')

@section('content')

	<h1 class="tk-seravek-web">Sermon Series</h1><br/>

  @foreach ($series as $item)
  <div class="col-md-4">
    <a href="{{ route('series.show', $item->slug) }}" style="background-image: url({{ $item->image }}); background-size: cover; width: 200px; height: 200px; display: block; background-position: center center;"></a>
    <a href="{{ route('series.show', $item->slug) }}">
      <h4 class="tk-seravek-web"><a href="{{ route('series.show', $item->slug) }}" >{{ $item->title }}</a></h4></a>
      <p>{{ $item->body }}</p>
    </a>
  </div>
  @endforeach

@endsection
