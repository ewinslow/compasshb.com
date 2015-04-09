@extends('layouts.dashboard.master')

@section('content')
<h1 class="tk-seravek-web">Home Fellowship Groups</h1>

<br/>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Latest Sermon and Worksheet</h3>
  </div>
  <div class="panel-body">
    <p>The materials on this page are to help you prepare for home fellowship group discussions.</p>
    <h3>{{ $sermon->title }}<h3>
    <div class="videocontainer">{!! $sermon->iframe !!}</div>
    <p><br/><a href="{{ $sermon->worksheet }}" class="btn btn-default">Worksheet</a></p>
  </div>
</div>

@endsection


@section('sidebar')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title tk-seravek-web">About</h3>
  </div>
  <div class="panel-body">
    <p>Worksheet questions are designed for the application of this week's sermon. Take some time to thoughtfully write out the answers. It is also helpful to discuss in a home fellowship group. If you would like more information on a home fellowship group, email info@compassHB.com.</p>
    <p><a href="mailto:info@compasshb.com" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span>  Sign Up</a></p>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title tk-seravek-web">Groups</h3>
  </div>
  <div class="panel-body">
    @foreach ($days as $day)
      <h4 class="tk-seravek-web">{{ $day }}</h4>
      <ul class="list-unstyled">
        @foreach ($fellowships as $fellowship)
          @if ($fellowship['day'] == $day)
            <li>{{ $fellowship['title'] }} @ {{ $fellowship['location'] }}
              {{ (isset($fellowship['description'])) ? $fellowship['description'] : '' }}</li>
          @endif
        @endforeach
      </ul>
      @endforeach
  </div>
</div>

@endsection
