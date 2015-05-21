@extends('layouts.master')

@section('content')
</div>

<div class="container-fluid">
    <div class="row" style="background-color: #fff; padding-top: 40px;">
        <div class="col-xs-10 col-xs-offset-1">
            <p><a href="/events">Back to Events</a></p>
        	<h2 class="tk-seravek-web">Events</h2>
                <img src='{{ $event->logo->url }}' style="width: 650px;" /><br/>
                <h3>{{ $event->name->text }}</h3>
                <h4>{{ date("F j, Y (l)", strtotime($event->start->local)) }}</h4>
                <p>Venue: {{ $event->venue->name }}</p>
                <p>{!! $event->description->html !!}</p>
                <br/><br/>
                <img src="http://maps.google.com/maps/api/staticmap?center={{ $event->venue->latitude }},{{ $event->venue->longitude }}&zoom=11&size=650x150&sensor=false" style="width: 650px; height: 150px;" />
                <br/><br/><br/>
        </div>
    </div>
</div>

<div class="container">
@endsection

@section('sidebar')
@stop
