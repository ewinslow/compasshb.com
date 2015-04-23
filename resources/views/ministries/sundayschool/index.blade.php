@extends('layouts.master')

@section('content')

	{{-- Header Row --}}
	<div class="row" style="background: url(https://secure.smugmug.com/PhotoArchive/Worship-Services/Weekend-Service-022215/i-nN8dnFB/0/L/150222_SER_SS-016-L.jpg); background-size: cover; background-position: center; height: 125px">
        <div class="col-xs-10 col-xs-offset-1">
            <h1 class="tk-seravek-web" style="color: #FFF">Sunday School</h1><br/>
        </div>
    </div>

	{{-- Current Series --}}
    <div class="row" style="background:none; background-color: #FFF; padding-top: 30px;padding-bottom: 30px;">
    	<div class="col-md-10 col-md-offset-1">
	        <h3>{{ $current->series->title }}</h3>
	        <p>{{ $current->series->body }}</p>
			<table class="table table-striped">
				<thead>
			    	<tr>
			        	<th>Title</th>
			        	<th>Teacher</th>
			        	<th>Date</th>
			      	</tr>
			    </thead>
			    <tbody>
			    @foreach ($upcoming as $sermon)
			      	<tr>
			        	<td>{{ $sermon->title }}</td>
			        	<td>{{ $sermon->teacher }}</td>
			        	<td>{{ date_format($sermon->published_at, 'l, F j, Y') }}</td>
			      	</tr>
			     @endforeach
			    @foreach ($sermons as $sermon)
			      	<tr>
			        	<td><a href="{{ route('sermons.show', $sermon->slug) }}">{{ $sermon->title }}</a></td>
			        	<td>{{ $sermon->teacher }}</td>
			        	<td>{{ date_format($sermon->published_at, 'l, F j, Y') }}</td>
			      	</tr>
			     @endforeach
			    </tbody>
			 </table>

	        <br/><hr/><br/>
	        <h3>Previous Series</h3>
	          <table class="table table-striped">
			    <thead>
			      <tr>
			        <th>Title</th>
			      </tr>
			    </thead>
			    <tbody>
			      @foreach ($series as $s)
			      <tr>
			        <td><a href="{{ route('series.show', $s->slug) }}">{{ $s->title }}</a></td>
			      </tr>
			      @endforeach
			    </tbody>
			</table>
		</div>
    </div>

@stop
