@extends('layouts.dashboard.master')

@section('content')

	<h1 class="tk-seravek-web">{{ $series->title }}</h1><br/>

  @foreach ($sermons as $sermon)
  <div class="col-md-4">
    <a href="{{ route('sermons.show', $sermon->slug) }}">
      <img src="{{ $sermon->image }}" alt="{{ $sermon->title }}" width="300"/><br/>
      <h4 class="tk-seravek-web">{{ $sermon->title }}</h4></a>
      <p>{{ $sermon->text }}<br/>
      {{ date_format($sermon->published_at, 'l, F j, Y') }}</p>
    </a>
  </div>
  @endforeach

@endsection
