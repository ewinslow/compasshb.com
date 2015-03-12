<nav class="navbar navbar-default navbar-fixed-top">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
      data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ route('home') }}">
        <img src="http://www.compasshb.com/app/uploads/2014/10/CBC-HB-logo-small.png"
        alt="Compass Bible Church" style="height: 40px; margin-top: -10px"/>
      </a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li class="hidden-sm hidden-md hidden-lg"><a href="{{ route('read.index') }}">Read</a></li>
        <li class="hidden-sm hidden-md hidden-lg"><a href="{{ route('pray') }}">Pray</a></li>
        <li class="hidden-sm hidden-md hidden-lg"><a href="{{ route('sermons.index') }}">Sermons</a></li>
        <li class="hidden-sm hidden-md hidden-lg"><a href="{{ route('songs.index') }}">Worship</a></li>
        <li class="hidden-sm hidden-md hidden-lg"><a href="{{ route('fellowship.index') }}">Fellowship</a></li>
        <li class="hidden-sm hidden-md hidden-lg"><a href="{{ route('home') }}">Home</a></li>
      </ul>
      <p class="navbar-text navbar-right hidden-xs">
        <a href="#" onClick="javascript:alert('You are in dashboard view. Click Home to return to the homepage. Send feedback to info@compasshb.com');"><span class="glyphicon glyphicon-question-sign" style="font-size: 1.5em"></span></a>
      </p>
      <p class="navbar-text navbar-right hidden-xs">{{ date('l, F j') }}</p>
    </div>
</nav>
