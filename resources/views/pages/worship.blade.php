@extends('layouts.dashboard')

@section('content')
<h1 class="page-header">Worship</h1>

<p>Worship songs here...</p>

<div class="row">
	@for ($i=0; $i<6; $i++)
	<div class="col-md-4">
    <div class="thumbnail">
    	<img src="...feature_image..." alt="..."/>
    	<div class="caption">
        <h3>Title</h3>
        <p>Song</p>
        <p><a href="#" class="btn btn-primary" role="button">Watch</a></p>
    	</div>
		</div>
	</div>
	@endfor
</div>

@endsection

@section('sidebar')
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Last Week's Songs</h3>
  </div>
  <div class="panel-body">
    <ul>
    	<li>10,000 Reasons</li>
    	<li>Amazing Grace</li>
    </ul>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Audio Player</h3>
  </div>
  <div class="panel-body">
  	<p>Play - keep going when on other pages reptaing</p>
  </div>
</div>
@endsection