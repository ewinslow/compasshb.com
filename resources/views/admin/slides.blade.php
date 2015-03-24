@extends('layouts.dashboard')

@section('content')

  @include('admin.header')

<!-- Slides -->
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title tk-seravek-web" id="blogs">Slides</h3>
  </div>
  <div class="panel-body">
    <p>All slides and links to edit the content or post new ones.</p>
    <p><a href="{{ route('slides.create') }}" class="btn btn-default">New Slide</a></p>
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
      @foreach ($slides as $slide)
        <tr>
          <td>{{ $slide->title }}</td>
          <td>{{ date_format($slide->published_at, 'Y-m-d l') }}</td>
          <td>{{ $slide->published_at->lt(\Carbon\Carbon::now()) ? 'Live' : 'Scheduled' }}</td>
          <td><a href="{{ route('slides.edit', $slide->id) }}">Edit</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

{!! $slides->render() !!}

@endsection

@section('sidebar')

  @include('admin.sidebar')

@endsection
