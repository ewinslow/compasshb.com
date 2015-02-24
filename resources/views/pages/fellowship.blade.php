@extends('layouts.dashboard')

@section('content')

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="/read">Read <span class="badge">10</span><span class="sr-only">(current)</span></a></li>
            <li><a href="/pray">Pray</a></li>
            <li class="active"><a href="/fellowship">Fellowship</a></li>
            <li><a href="/learn">Learn</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Home Fellowship Groups</h1>

        <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Panel title</h3>
                </div>
                <div class="panel-body">
                    Panel content
                </div>
        </div>

        </div>
      </div>
    </div>
@endsection