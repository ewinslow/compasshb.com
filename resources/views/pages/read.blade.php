@extends('layouts.dashboard')

@section('content')

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="/read">Read<span class="badge">10</span><span class="sr-only">(current)</span></a></li>
            <li><a href="/pray">Pray</a></li>
            <li><a href="/fellowship">Fellowship</a></li>
            <li><a href="/learn">Learn</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

              <h1 class="page-header">{{ $post[0]->post_title }}</h1>

          <div class="row">
            <div class="col-md-8">
                          <p>{{ $post[0]->post_date }}</p>


                                              <ul class="nav nav-pills">
  <li role="presentation" class="active"><a href="#">Today's Scripture</a></li>
  <li role="presentation"><a href="#">Comment <span class="badge">12</span></a></li>
</ul>


              <p>{!! $content !!}</p>
            </div>
            <div class="col-md-4">

              <div class="panel panel-default">
                  <div class="panel-heading">
                      <h3 class="panel-title">Scripture of the Day</h3>
                  </div>
                  <div class="panel-body">

                      <ul>
                        <li>Today</li>
                        <li>Yesterday</li>
                        <li>Two Days Ago</li>
                      </ul>
                  </div>
              </div>
            </div>
          </div>


        </div>
      </div>
    </div>
@endsection