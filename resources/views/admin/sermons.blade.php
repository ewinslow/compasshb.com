@extends('layouts.dashboard')

@section('content')

  @include('admin.header')

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
        <th>Worksheet</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($sermons as $sermon)
        <tr>
          <td>{{ $sermon->sku }}</td>
          <td><a href="{{ route('sermons.show', $sermon->slug) }}">{{ $sermon->title }}</a></td>
          <td>{{ $sermon->text }}</td>
          <td>{{ date_format($sermon->published_at, 'Y-m-d l') }}</td>
          <td>{!! $sermon->worksheet ? '<span class="glyphicon glyphicon-ok"></span>' : '' !!}</td>
          <td>{{ $sermon->published_at->lt(\Carbon\Carbon::now()) ? 'Published' : 'Scheduled' }}</td>
          <td><a href="{{ route('sermons.edit', $sermon->slug) }}">Edit</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

{!! $sermons->render() !!}

@endsection

@section('sidebar')

  @include('admin.sidebar')

@endsection
