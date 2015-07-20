<div class="col-sm-3 hidden-xs dashboard-side">

      <a href="{{ route('home') }}">
        <img src="{{ URL::to('/') }}/images/CBC-HB-logo-small.png"
        alt="Compass Bible Church Huntington Beach" class="logo"/>
      </a>

  <ul class="nav nav-pills nav-stacked">
    <li class="{{ setActive('read') }}"><a href="{{ route('read.index') }}">Read</a></li>
    <li class="{{ setActive('events') }}"><a href="{{ route('events.index') }}">Events</a></li>
    <li class="{{ setActive('sermons') }}"><a href="{{ route('sermons.index') }}">Sermons</a></li>
    <li class="{{ setActive('fellowship') }}"><a href="{{ route('fellowship.index') }}">Fellowship</a></li>
    <li class="{{ setActive('songs') }}"><a href="{{ route('songs.index') }}">Worship</a></li>
    <li class="{{ setActive('blog') }}"><a href="{{ route('blog.index') }}">Blog</a></li>
    <li class="{{ setActive('pray') }}"><a href="{{ route('pray') }}">Pray</a></li>
    <li><a href="{{ route('home') }}">Home</a></li>

    @if (Auth::check())
    	<li class="{{ setActive('admin') }}"><a href="{{ route('admin.index') }}">Admin</a></li>
    @endif

  </ul>
</div>
