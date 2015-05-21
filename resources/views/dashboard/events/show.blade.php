@extends('layouts.dashboard.master')

@section('content')

	<h2 class="tk-seravek-web">{{ $event->name->text }}</h2>
    <img src='{{ $event->logo->url }}' style="width: 650px;" /><br/>
    <h4>{{ date("F j, Y (l)", strtotime($event->start->local)) }}</h4>
    <p>Venue: {{ $event->venue->name }}</p>
    <p>{!! $event->description->html !!}</p>
    <br/><br/>
    <img src="http://maps.google.com/maps/api/staticmap?center={{ $event->venue->latitude }},{{ $event->venue->longitude }}&zoom=11&size=650x150&sensor=false" style="width: 650px; height: 150px;" />
    <br/><br/><br/>

@endsection


@section('sidebar')

  @include('dashboard.events.sidebar')

@endsection
