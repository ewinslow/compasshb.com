@extends('layouts.dashboard')

@section('content')

	<h1 class="tk-seravek-web">Blog</h1>

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
        <td><a href="{{ route('blog.show', $blog->id) }}">{{ $blog->title }}</a></td>
        <td>{{ date_format($blog->published_at, 'l, F j, Y') }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection


@section('sidebar')

  @include('blogs.sidebar')

@endsection
