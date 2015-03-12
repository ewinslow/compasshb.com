@extends('layouts.dashboard')

@section('content')
<h1 class="tk-seravek-web">Admin</h1>
<p>Admin page for posting and scheduling site content.</p>

<br/>

<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">
    <h3 class="panel-title tk-seravek-web" id="scriptureoftheday">Scripture of the Day</h3>
  </div>
  <div class="panel-body">
    <p>Here is a list of all of the scripture of the day passages and links to edit the content or post new ones.</p>
    <p><a href="{{ route('read.create') }}" class="btn btn-default">New Passage</a></p>
  </div>

  <!-- Table -->
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Passage</th>
        <th>Publish Date</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($passages as $index => $passage)
        <tr>
          <td><a href="{{ route('read.show', $passage->id) }}">{{ $passage->title }}</a></td>
          <td>{{ date_format($passage->published_at, 'Y-m-d l') }}</td>
          <td>{{ $passage->published_at->lt(\Carbon\Carbon::now()) ? 'Published' : 'Scheduled' }}</td>
          <td><a href="{{ route('read.edit', $passage->id) }}">Edit</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

<br/>

<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">
    <h3 class="panel-title tk-seravek-web" id="fellowship">Home Fellowship Groups</h3>
  </div>
  <div class="panel-body">
    <p>All of the home fellowship groups.</p>
    <p><a href="{{ route('fellowship.create') }}" class="btn btn-default">New Home Fellowship Group</a></p>
  </div>

  <!-- Table -->
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Home Fellowship Group</th>
        <th>Day</th>
        <th>Location</th>
        <th>Description</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($fellowships as $fellowship)
        <tr>
          <td>{{ $fellowship->title }}</td>
          <td>{{ $fellowship->day }}</td>
          <td>{{ $fellowship->location }}</td>
          <td>{{ $fellowship->description }}</td>
          <td><a href="{{ route('fellowship.edit', $fellowship->id) }}">Edit</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

<br/>

<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">
    <h3 class="panel-title tk-seravek-web" id="worship">Worship Songs</h3>
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
        <th>Action</th>
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
<h1 class="page-title tk-seravek-web">&nbsp;</h1>
<p>&nbsp;</p><br/>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title tk-seravek-web">Jump to...</h3>
  </div>
  <div class="panel-body">
    <ul class="list-unstyled">
      <li><a href="#scriptureoftheday">Scripture of the Day</a></li>
      <li><a href="#fellowship">Home Fellowship Groups</a></li>
      <li><a href="#worship">Worship</a></li>
    </ul>
  </div>
</div>

<p><a href="/auth/logout" class="btn btn-default">Logout</a></p>
@endsection