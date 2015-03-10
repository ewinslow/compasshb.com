@extends('layouts.dashboard')

@section('content')
<h1 class="tk-seravek-web">Admin</h1>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title tk-seravek-web">Scripture of the Day</h3>
  </div>
  <div class="panel-body">
    <p>Links</p>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title tk-seravek-web">Worship Songs</h3>
  </div>
  <div class="panel-body">
    <ul>
      @foreach ($songs as $song)
        <li><a href="songs/{{ $song->id }}">{{ $song->title }}</a> (<a href="songs/{{ $song->id }}/edit">Edit</a>)</li>
      @endforeach
    </ul>
    <p><a href="/songs/create" class="btn btn-default">New Song</a></p>
  </div>
</div>


@endsection

@section('sidebar')
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title tk-seravek-web">Quicklinks</h3>
  </div>
  <div class="panel-body">
    <p>Links</p>
  </div>
</div>
@endsection