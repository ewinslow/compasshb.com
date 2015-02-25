@extends('layouts.dashboard')

@section('content')
<h1 class="page-heading">Prayer Topic</h1>
<ul class="list-group">
  <li class="list-group-item"><label><input type="checkbox"> Item 1</label></li>
  <li class="list-group-item"><label><input type="checkbox"> Item 1</label></li>
  <li class="list-group-item"><label><input type="checkbox"> Item 1</label></li>
  <li class="list-group-item"><label><input type="checkbox"> Item 1</label></li>
  <li class="list-group-item"><label><input type="checkbox"> Item 1</label></li>
</ul>
@endsection

@section('sidebar')
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">About Prayer</h3>
  </div>
  <div class="panel-body">
    <p>Distinctive #2 is we rely on prayer.</p>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Learn to Pray</h3>
  </div>
  <div class="panel-body">

  <div class="media">
    <div class="media-left">
      <a href="#">
        <img class="media-object" src="..." alt="...">
      </a>
    </div>
    <div class="media-body">
      <h4 class="media-heading">If God's People Pray</h4>
      <p>Why we should pray</p>
    </div>
  </div>

  <div class="media">
    <div class="media-left">
      <a href="#">
        <img class="media-object" src="..." alt="...">
      </a>
    </div>
    <div class="media-body">
      <h4 class="media-heading">When God's People Pray</h4>
      <p>How we should pray</p>
    </div>
  </div>  

  </div>
</div>

<p><a href="#" onClick="window.external.AddFavorite(location.href, 'pray'); return false" class="btn btn-default" >Bookmark this page</a></p>
@endsection