<div class="col-sm-3 col-md-2 sidebar">
  <ul class="nav nav-sidebar">
    <li class="{{ setActive('read') }}"><a href="{{ route('read.index') }}">Scripture of the Day</a></li>
    <li class="{{ setActive('events') }}"><a href="{{ route('events.index') }}">Event Calendar</a></li>
    <li class="{{ setActive('sermons') }}"><a href="{{ route('sermons.index') }}">Sermon Library</a></li>
    <li class="{{ setActive('fellowship') }}"><a href="{{ route('fellowship.index') }}">Home Fellowship Groups</a></li>
    <li class="{{ setActive('songs') }}"><a href="{{ route('songs.index') }}">Worship Songs</a></li>
    <li class="{{ setActive('blog') }}"><a href="{{ route('blog.index') }}">Blog</a></li>
    <li class="{{ setActive('pray') }}"><a href="{{ route('pray') }}">Pray</a></li>

    @if (Auth::check())
    	<li class="{{ setActive('admin') }}"
    		style="position: absolute; width: 100%; bottom: 40px;"><a href="{{ route('admin') }}">Admin</a>
    	</li>
    @endif

    <li style="position: absolute; width: 100%; bottom: 0;"><a href="{{ route('home') }}">Home</a></li>
  </ul>
</div>
