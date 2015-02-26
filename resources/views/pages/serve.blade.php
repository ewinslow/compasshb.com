@extends('layouts.dashboard')

@section('content')
<h1 class="page-header">Serve</h1>

@endsection

@section('sidebar')
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Panel title</h3>
  </div>
  <div class="panel-body">
    <p>Get Involved</p>
  </div>
</div>

<p><a href="#" onClick="window.external.AddFavorite(location.href, 'pray'); return false" class="btn btn-default" ><span class="glyphicon glyphicon-home"></span>  Bookmark this page</a></p>
@endsection