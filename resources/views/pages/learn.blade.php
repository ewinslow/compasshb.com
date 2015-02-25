@extends('layouts.dashboard')

@section('content')
<h1 class="page-header">Bible Study</h1>
@endsection

@section('sidebar')
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Panel title</h3>
  </div>
  <div class="panel-body">
    <p>Recent Sermons<br/>
    Sermons by Series<br/>
    Scripture References<br/>
    I am picturing a "heat-map" type of graphic (similar to the GitHub contributions boxes) where there is one box for each chapter in the Bible (~1000) and each box is a different color based on the number of times content on the site references that chapter. Clicking on a box would show the semrons/cross-refernces, etc.<br/></p>
  </div>
</div>
@endsection