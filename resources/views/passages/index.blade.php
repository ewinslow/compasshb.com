@extends('layouts.dashboard')

@section('content')
<link rel="canonical" href="http://www.compasshb.com/{{ route('read.show', $passages->first()->slug) }}/" />
<link rel="stylesheet" href="https://raw.githubusercontent.com/VodkaBears/Interdimensional/master/dist/interdimensional.css">
<script src="https://raw.githubusercontent.com/VodkaBears/Interdimensional/master/dist/interdimensional.min.js"></script>
<script>
	document.addEventListener("DOMContentLoaded", function()
	{
		Interdimensional.charge({
        	PPD: 1,
            insensitivity: 3
        })
    });
</script>
<h1 class="tk-seravek-web">Scripture of the Day</h1>

<p>{{ $analytics['activeUsers'] }} active users. {{ $analytics['sessions'] }} people have read today. <!-- {{ $analytics['avgSessionDuration'] }} minutes average time reading.--></p>

  {!! $postflash !!}
  {!! $passage->body !!}
  {!! $passage->verses !!}

	@include('passages.comments');

@endsection


@section('sidebar')

  @include('passages.sidebar')

@endsection
