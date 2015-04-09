@extends('layouts.dashboard.master')

@section('content')

  @include('layouts.admin.header')

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
          <td><a href="{{ route('fellowship.edit', $fellowship->slug) }}">Edit</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

{!! $fellowships->render() !!}

@endsection

@section('sidebar')

  @include('layouts.admin.sidebar')

@endsection
