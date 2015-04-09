@extends('layouts.dashboard.master')

@section('content')

	<h1 class="tk-seravek-web">Sermon Series</h1>

<div class="panel panel-default">
  <div class="panel-heading tk-seravek-web">All Series</div>
  <div class="panel-body">
    <p>Archive of all series</p>
  </div>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Title</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($series as $s)
      <tr>
        <td><a href="{{ route('series.show', $s->slug) }}">{{ $s->title }}</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection
