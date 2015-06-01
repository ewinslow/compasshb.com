@extends('layouts.dashboard.master')

@section('content')
	<h2 class="tk-seravek-web">Events</h2>

    <div class="panel panel-default">
      <div class="panel-body">
        <p>The schedule of mid-week home fellowship groups is available at the <a href="/fellowship">Fellowship</a> page.</p>
      </div>
    </div>


    <ul class="list-group">
    @foreach ($events as $event)
        <li class="list-group-item">
            <h4>{{ date("F j, Y (l)", strtotime($event->start->local)) }}</h4>
            <a href='/events/{{ $event->id }}/{{ str_slug($event->name->text, "-") }}/' class="btn btn-default" style="float: right">Details</a>
            <img src='{{ $event->logo->url }}' style="float: left; width: 250px; padding-right: 20px" />
            <h5><a href='/events/{{ $event->id }}/{{ str_slug($event->name->text, "-") }}/'>{{ $event->name->text }}</a></h5>
            <p style="clear: right">Venue: {{ $event->venue->name }}</p>
            <p>{!! substr($event->description->html, 0, 244) !!}... <a href='/events/{{ $event->id }}/{{ str_slug($event->name->text, "-") }}/'>More</a></p>
        <br style="clear: both"/>
        </li>
    @endforeach
    </ul>

@endsection


@section('sidebar')

@endsection
