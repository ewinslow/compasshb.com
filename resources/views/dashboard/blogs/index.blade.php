@extends('layouts.dashboard.master')

@section('content')

	<h1 class="tk-seravek-web">Blog</h1>

    @include('dashboard.search.form')

<div class="panel panel-default">
  <div class="panel-heading tk-seravek-web">All Blog Posts</div>
  <div class="panel-body">
    <p>Archive of all blog posts</p>
  </div>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Title</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($blogs as $blog)
      <tr>
        <td><a href="{{ route('blog.show', $blog->slug) }}">{{ $blog->title }}</a></td>
        <td>{{ date_format($blog->published_at, 'l, F j, Y') }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
      <h3 class="panel-title tk-seravek-web">Blogs</h3>
    </div>
    <div class="panel-body">
      <p><a href="/blog/">View all blogs/videos</a></p>
      <p><a href="{{ route('feed.blog.xml') }}">RSS</a></p>
    </div>
</div>

@endsection