@extends('layouts.dashboard')

@section('content')

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="/read">Read <span class="badge">10</span><span class="sr-only">(current)</span></a></li>
            <li><a href="/pray">Pray</a></li>
            <li><a href="/fellowship">Fellowship</a></li>
            <li class="active"><a href="/learn">Learn</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Bible Study</h1>

        <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Panel title</h3>
                </div>
                <div class="panel-body">
                    Recent Sermons<br/>
                    Sermons by Series<br/>
                    Scripture References<br/>
                    I am picturing a "heat-map" type of graphic (similar to the GitHub contributions boxes) where there is one box for each chapter in the Bible (~1000) and each box is a different color based on the number of times content on the site references that chapter. Clicking on a box would show the semrons/cross-refernces, etc.<br/>
                </div>
            </div>
            
        </div>
      </div>
    </div>
@endsection