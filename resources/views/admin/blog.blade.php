@extends('layouts.dashboard.master')

@section('content')

  @include('layouts.admin.header')

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
          <td><a href="{{ route('blog.show', $blog->slug) }}">{{ $blog->title }}</a></td>
          <td>{{ date_format($blog->published_at, 'Y-m-d l') }}</td>
          <td>{{ $blog->published_at->lt(\Carbon\Carbon::now()) ? 'Published' : 'Scheduled' }}</td>
          <td><a href="{{ route('blog.edit', $blog->slug) }}">Edit</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

{!! $blogs->render() !!}

@endsection

@section('sidebar')

  @include('layouts.admin.sidebar')

@endsection
