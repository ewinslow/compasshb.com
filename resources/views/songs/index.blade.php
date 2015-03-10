@extends('layouts.dashboard')


@section('content')
<h1 class="tk-seravek-web">Worship Songs</h1>
<p>Original worship songs from Compass HB.</p>

<div class="row">
  @foreach ($songs as $song)
    <div class="col-md-4">
      <div class="thumbnail">
        <img src="{{ $song->thumbnail }}" alt="{{ $song->title }}"/>
        <div class="caption">
          <h5 class="tk-seravek-web">{{ $song->title }}</h5>
          <p>{{ $song->excerpt }}<br/><a href="{{ url('songs', $song->id) }}" class="btn btn-default" role="button">Listen</a></p>
        </div>
      </div>
    </div>
  @endforeach
</div>

@endsection

@section('sidebar')
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title tk-seravek-web">Last Week's Songs</h3>
  </div>
  <div class="panel-body">
    <p>Coming soon...</p>
    <ul>
{{--       @foreach($setlist as $setitem)
    	<li>{{ $setitem }}</li>
      @endforeach
      --}}
    </ul>
  </div>
</div>

<script src="http://jwpsrv.com/library/jA0rDsOIEeS9zw4AfQhyIQ.js"></script>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title tk-seravek-web">Audio Player</h3>
  </div>
  <div class="panel-body">
  	<div id="myElement"></div>

<script>
    jwplayer("myElement").setup({
        file: "http://www.compasshb.com/app/uploads/2015/02/There-is-a-Rock.mp3",
        width: 250,
        height: 30
    });
</script>
  </div>
</div>
@endsection
