
<div class="top-border"></div>
<nav class="navbar navbar-default hidden-sm hidden-md hidden-lg">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
    data-target="#navbar" aria-expanded="false" aria-controls="navbar">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="{{ route('home') }}">
      <img src="{{ URL::to('/') }}/images/CBC-HB-logo-small.png" alt="Compass Bible Church" style="height: 40px; margin-top: -10px"/>
    </a>
  </div>
  <div id="navbar" class="navbar-collapse collapse">
    <ul class="nav navbar-nav navbar-right">
      <li class="hidden-sm hidden-md hidden-lg"><a href="{{ route('read.index') }}">Read</a></li>
      <li class="hidden-sm hidden-md hidden-lg"><a href="{{ route('events.index') }}">Events</a></li>
      <li class="hidden-sm hidden-md hidden-lg"><a href="{{ route('sermons.index') }}">Sermons</a></li>
      <li class="hidden-sm hidden-md hidden-lg"><a href="{{ route('fellowship.index') }}">Fellowship</a></li>
      <li class="hidden-sm hidden-md hidden-lg"><a href="{{ route('songs.index') }}">Worship</a></li>
      <li class="hidden-sm hidden-md hidden-lg"><a href="{{ route('blog.index') }}">Blog</a></li>
      <li class="hidden-sm hidden-md hidden-lg"><a href="{{ route('pray') }}">Pray</a></li>
      <li class="hidden-sm hidden-md hidden-lg"><a href="{{ route('home') }}">Home</a></li>
    </ul>
  </div>
</nav>