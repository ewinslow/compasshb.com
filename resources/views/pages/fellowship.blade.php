@extends('layouts.dashboard')

@section('content')
<h1 class="page-header">Home Fellowship Groups</h1>

    Recent Sermon

    Sermon Postscript

    Download Worksheet

@endsection

@section('sidebar')
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">About Home Fellowship Groups</h3>
  </div>
  <div class="panel-body">
  	<p>Get involved today.</p>
	<a href="/fellowship" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span>  Sign Up</a>
  </div>
</div>

<p><a href="#" onClick="window.external.AddFavorite(location.href, 'pray'); return false" class="btn btn-default" ><span class="glyphicon glyphicon-bookmark"></span>  Bookmark this page</a></p>
@endsection