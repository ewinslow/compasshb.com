@extends('layouts.dashboard.master')

@section('content')

  @include('layouts.admin.header')

{{-- Sunday School Messages --}}
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title tk-seravek-web" id="sermons">Sunday School Lessons</h3>
  </div>
  <div class="panel-body">
    <p>All messages and links to edit the content or post new ones.</p>
    <p><a href="{{ route('sermons.create') }}" class="btn btn-default">New Lesson</a></p>
  </div>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Sermon</th>
        <th>Text</th>
        <th>Publish Date</th>
        <th>Worksheet</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($sermons as $sermon)
        <tr>
          <td>{{ $sermon->sku }}</td>
          <td><a href="{{ route('sermons.edit', $sermon->slug) }}">{{ $sermon->title }}</a></td>
          <td>{{ $sermon->text }}</td>
          <td>{{ date_format($sermon->published_at, 'Y-m-d l') }}</td>
          <td>{!! $sermon->worksheet ? '<span class="glyphicon glyphicon-ok"></span>' : '' !!}</td>
          <td>{{ $sermon->published_at->lt(\Carbon\Carbon::now()) ? 'Published' : 'Scheduled' }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

{!! $sermons->render() !!}

{{-- Series --}}
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title tk-seravek-web" id="series">Sunday School Series</h3>
  </div>
  <div class="panel-body">
    <p>All series and links to edit the content or post new ones.</p>
    <p><a href="{{ route('series.create') }}" class="btn btn-default">New Series</a></p>
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
          <td><a href="{{ route('series.edit', $s->slug) }}">{{ $s->title }}</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

{!! $series->render() !!}

  @include('layouts.admin.sidebar')

@endsection