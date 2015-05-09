@extends('layouts.master')

@section('content')
</div>

<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.3.1/fullcalendar.min.js"></script>
<script type='text/javascript' src='//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.3.1/gcal.js'></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.3.1/fullcalendar.min.css"></script>

<div class="container-fluid">
<div class="row" style="background-color: #fff; padding-top: 40px;">
<div class="col-xs-10 col-xs-offset-1">
	<h2 class="tk-seravek-web">Events</h2>

	@foreach($events as $event)
		<p>{{ $event->summary }}</p>
	@endforeach


	<div id="calendar"></div><br/>
</div>
</div>


<script type='text/javascript'>

$(document).ready(function() {
    $('#calendar').fullCalendar({
        googleCalendarApiKey: 'AIzaSyAvdtgAFMdhj8_XAZNqThOLqTmjtvUdtps',
        events: {
            googleCalendarId: '{{ env('GOOGLE_CALENDAR_ID') }}'
        }
    });
});

</script>

@endsection

@section('sidebar')
@stop
