@extends('layouts.dashboard.master')

@section('content')

	<h1 class="tk-seravek-web">{{ $series->title }}</h1>

<div class="panel panel-default">
  <div class="panel-heading tk-seravek-web">Series</div>
  <div class="panel-body">
  	<p>{!! $series->body !!}</p>
  </div>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Title</th>
        <th>Text</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($sermons as $sermon)
      <tr>
        <td>{{ $sermon->sku }}</td>
        <td><a href="{{ route('sermons.show', $sermon->slug) }}">{{ $sermon->title }}</a></td>
        <td>{{ $sermon->text }}</td>
        <td>{{ date_format($sermon->published_at, 'l, F j, Y') }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection
