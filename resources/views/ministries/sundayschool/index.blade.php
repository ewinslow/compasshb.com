@extends('layouts.master')

@section('content')

	{{-- Header Row --}}
	<div class="row" style="background: url(https://secure.smugmug.com/PhotoArchive/Worship-Services/Weekend-Service-022215/i-nN8dnFB/0/L/150222_SER_SS-016-L.jpg); background-size: cover; background-position: center; height: 185px; padding-top: 50px">
        <div class="col-xs-10 col-xs-offset-1" style="color: #FFF">
            <h1 class="tk-seravek-web">Sunday School</h1>
            <p>Meets Sundays at 9am</p><br/>
        </div>
    </div>

	{{-- Current Series --}}
    <div class="row" style="background:none; background-color: #FFF; padding-top: 30px;padding-bottom: 30px;">
    	<div class="col-md-10 col-md-offset-1">
	        <h3>Current Series: {{ $series->first()->title }}</h3>
	        <p>{{ $series->first()->body }}</p>
			<table class="table table-striped">
				<thead>
			    	<tr>
			        	<th>Title</th>
			        	<th>Teacher</th>
			        	<th>Date</th>
			      	</tr>
			    </thead>
			    <tbody>
			    @foreach ($sermons as $sermon)
			      	<tr>
			        	<td><a href="{{ route('sermons.show', $sermon->slug) }}">{{ $sermon->title }}</a></td>
			        	<td>{{ $sermon->teacher }}</td>
			        	<td>{{ date_format($sermon->published_at, 'l, F j, Y') }}</td>
			      	</tr>
			     @endforeach
			    </tbody>
			</table>
		</div>
	</div>

	<div class="row" style="background:none; background-color: #FFF; padding-top: 30px;padding-bottom: 30px;">
	<div class="col-md-10 col-md-offset-1">
	    <h3>All Sunday School Series</h3>

	    @foreach ($series as $s)
		<div class="col-sm-6 col-md-4" style="height: 300px;">
		    <div class="thumbnail" style="width: 310px; height: 150px; background-image: url('{{ $s->image }}'); background-size: cover; background-position: top center; padding-top: 150px">
		    	<div class="caption">
		        	<h3><a href="{{ route('series.show', $s->slug) }}">{{ $s->title }}</a></h3>
		        	<p>{{ $s->body }}</p>
		      	</div>
		    </div>
		</div>
		@endforeach
	</div></div>

@stop
