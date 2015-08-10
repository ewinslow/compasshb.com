@extends('layouts.master')

@section('side')
  @include('layouts.side.admin')
@endsection

@section('content')

<h1 class="tk-seravek-web">Admin</h1>
<p>Admin page for posting and scheduling site content.</p><br/>

{{-- Worship Songs --}}
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
      </tr>
    </thead>
    <tbody>
      @foreach ($songs as $index => $song)
        <tr>
          <td>{{ $index+1 }}</td>
          <td><a href="{{ route('songs.edit', $song->slug) }}">{{ $song->title }}</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

{!! $songs->render() !!}

@endsection