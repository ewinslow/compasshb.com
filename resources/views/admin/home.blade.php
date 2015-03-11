@extends('layouts.dashboard')

@section('content')
<h1 class="tk-seravek-web">Admin</h1>

<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">
    <h3 class="panel-title tk-seravek-web">Scripture of the Day</h3>
  </div>
  <div class="panel-body">
    <p>Here is a list of all of the scripture of the day passages and links to edit the content or post new ones.</p>
    <p><a href="{{ route('songs.create') }}" class="btn btn-default">New Post</a></p>
  </div>

  <!-- Table -->
  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Passage</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($songs as $index => $song)
        <tr>
          <td>{{ $index+1 }}</td>
          <td><a href="{{ route('songs.show', $song->id) }}">{{ $song->title }}</a></td>
          <td><a href="{{ route('songs.edit', $song->id) }}">Edit</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>




<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">
    <h3 class="panel-title tk-seravek-web">Worship Songs</h3>
  </div>
  <div class="panel-body">
    <p>Here is a list of all of the worship songs and links to edit the content or post new ones.</p>
    <p><a href="{{ route('songs.create') }}" class="btn btn-default">New Song</a></p>
  </div>

  <!-- Table -->
  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Song Name</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($songs as $index => $song)
        <tr>
          <td>{{ $index+1 }}</td>
          <td><a href="{{ route('songs.show', $song->id) }}">{{ $song->title }}</a></td>
          <td><a href="{{ route('songs.edit', $song->id) }}">Edit</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
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