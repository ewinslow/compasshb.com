@extends('layouts.dashboard')

@section('content')

  @include('admin.header')

<!-- Home Fellowship Groups -->
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title tk-seravek-web" id="sundayschool">Sunday School Messages</h3>
  </div>
  <div class="panel-body">
    <p>All Sunday School teaching.</p>
    <p><a href="{{ route('sundayschool.create') }}" class="btn btn-default">New Message</a></p>
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
      @foreach ($sermons as $sermon)
        <tr>
          <td>{{ $sermon->title }}</td>
          <td>{{ $sermon->day }}</td>
          <td>{{ $sermon->location }}</td>
          <td>{{ $sermon->description }}</td>
          <td><a href="{{ route('sermon.edit', $sermon->slug) }}">Edit</a></td>
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
