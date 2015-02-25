@extends('layouts.dashboard')

@section('content')
  {!! $content !!}
@endsection


@section('sidebar')
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">About Scripture of the Day</h3>
  </div>
  <div class="panel-body">
    <p>Read through a portion of scripture each day with your church family. Be encouraged by reading others' comments and leave your own.</p>
    <p>New content is posted Monday through Friday of each week.</p>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">This Week's Schedule</h3>
  </div>            
  <div class="panel-body">
    <ul>
      <li>Monday</li>
      <li>Tuesday</li>
      <li>Wednesday</li>
      <li>Thursday</li>
      <li>Friday</li>                
    </ul>
  </div>
</div>

<p><a href="#" onClick="window.external.AddFavorite(location.href, 'read'); return false" class="btn btn-default" >Bookmark Scripture of the Day</a></p>
@endsection