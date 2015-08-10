<div col="col-sm-3">
	<ul class="nav nav-pills nav-stacked side-nav">
	    <li class="{{ setActive('read') }}"><a href="{{ route('read.index') }}">Read</a></li>
	    <li class="{{ setActive('sermons') }}"><a href="{{ route('sermons.index') }}">Sermons</a></li>
	    <li class="{{ setActive('series') }}"><a href="{{ route('series.index') }}">Series</a></li>
	    <li class="{{ setActive('songs') }}"><a href="{{ route('songs.index') }}">Worship</a></li>
	    <li class="{{ setActive('events') }}"><a href="{{ route('events.index') }}">Events</a></li>
	    <li class="{{ setActive('pray') }}"><a href="{{ route('pray') }}">Prayer</a></li>
	    <li class="{{ setActive('blog') }}"><a href="{{ route('blog.index') }}">Blog</a></li>
	</ul>
</div>