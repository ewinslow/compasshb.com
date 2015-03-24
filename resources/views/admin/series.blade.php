@extends('layouts.dashboard')

@section('content')

  @include('admin.header')

<!-- Series -->
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title tk-seravek-web" id="series">Sermon Series</h3>
  </div>
  <div class="panel-body">
    <p>All series and links to edit the content or post new ones.</p>
    <p><a href="{{ route('series.create') }}" class="btn btn-default">New Series</a></p>
  </div>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Title</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($series as $s)
        <tr>
          <td><a href="{{ route('series.show', $s->slug) }}">{{ $s->title }}</a></td>
          <td><a href="{{ route('series.edit', $s->slug) }}">Edit</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

{!! $series->render() !!}

@endsection

@section('sidebar')

  @include('admin.sidebar')

@endsection
