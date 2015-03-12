@extends('layouts.dashboard')

@section('content')
<h1 class="tk-seravek-web">Admin</h1>
<p>Admin page for posting and scheduling site content.</p>

<br/>

<!-- Scripture of the Day -->
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title tk-seravek-web" ="scriptureoftheday">Scripture of the Day</h3>
  </div>
  <div class="panel-body">
    <p>Here is a list of all of the scripture of the day passages and links to edit the content or post new ones.</p>
    <p><a href="{{ route('read.create') }}" class="btn btn-default">New Passage</a></p>
  </div>
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

<!-- Sermons -->
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title tk-seravek-web" id="sermons">Sermons</h3>
  </div>
  <div class="panel-body">
    <p>All sermons and links to edit the content or post new ones.</p>
    <p><a href="{{ route('sermons.create') }}" class="btn btn-default">New Sermon</a></p>
  </div>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Sermon</th>
        <th>Text</th>
        <th>Publish Date</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($sermons as $sermon)
        <tr>
          <td>{{ $sermon->sku }}</td>
          <td><a href="{{ route('sermons.show', $sermon->id) }}">{{ $sermon->title }}</a></td>
          <td>{{ $sermon->text }}</td>
          <td>{{ date_format($sermon->published_at, 'Y-m-d l') }}</td>
          <td>{{ $sermon->published_at->lt(\Carbon\Carbon::now()) ? 'Published' : 'Scheduled' }}</td>
          <td><a href="{{ route('sermons.edit', $sermon->id) }}">Edit</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

<br/>

<!-- Blogs -->
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title tk-seravek-web" id="blogs">Blogs/Videos</h3>
  </div>
  <div class="panel-body">
    <p>All blogs and links to edit the content or post new ones.</p>
    <p><a href="{{ route('blog.create') }}" class="btn btn-default">New Blog</a></p>
  </div>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Title</th>
        <th>Publish Date</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($blogs as $blog)
        <tr>
          <td><a href="{{ route('blog.show', $blog->id) }}">{{ $blog->title }}</a></td>
          <td>{{ date_format($blog->published_at, 'Y-m-d l') }}</td>
          <td>{{ $blog->published_at->lt(\Carbon\Carbon::now()) ? 'Published' : 'Scheduled' }}</td>
          <td><a href="{{ route('blog.edit', $blog->id) }}">Edit</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

<br/>

<!-- Home Fellowship Groups -->
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title tk-seravek-web" id="fellowship">Home Fellowship Groups</h3>
  </div>
  <div class="panel-body">
    <p>All of the home fellowship groups.</p>
    <p><a href="{{ route('fellowship.create') }}" class="btn btn-default">New Home Fellowship Group</a></p>
  </div>
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

<!-- Worship Songs -->
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title tk-seravek-web" id="worship">Worship Songs</h3>
  </div>
  <div class="panel-body">
    <p>Here is a list of all of the worship songs and links to edit the content or post new ones.</p>
    <p><a href="{{ route('songs.create') }}" class="btn btn-default">New Song</a></p>
  </div>
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
      <li><a href="#sermons">Sermons</a></li>
      <li><a href="#blogs">Blogs</a></li>
      <li><a href="#fellowship">Home Fellowship Groups</a></li>
      <li><a href="#worship">Worship</a></li>
    </ul>
  </div>
</div>

<p><a href="/auth/logout" class="btn btn-default">Logout</a></p>
@endsection