@extends('layouts.master')

@section('content')
	<div class="row" style="background: url(https://secure.smugmug.com/PhotoArchive/Worship-Services/Weekend-Service-022215/i-nN8dnFB/0/L/150222_SER_SS-016-L.jpg); background-size: cover; background-position: center; height: 125px">
        <div class="col-xs-10 col-xs-offset-1">
            <h1 class="tk-seravek-web" style="color: #FFF">Sunday School</h1>
            <br/>
        </div>
    </div>

    <div class="row"
         style="background:none; background-color: #FFF; padding-top: 30px;padding-bottom: 30px;">
        <div class="container">

            <div class="col-md-4 col-md-offset-1">
                <h3>The Attributes of God</h3>
                <p>Beginning April 12, 2015, Compass Bible Church will begin a new Sunday School series on the Attributes of God. Please join us at 9:00 am in room 102 for breakfast. The teaching beings at 9:30 am.</p>

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

            </div>

            <div class="col-md-4 col-md-offset-2">
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
    </div>

</div>
@stop

@section('sidebar')
@stop
