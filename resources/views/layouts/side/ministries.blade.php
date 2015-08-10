<div col="col-sm-3">
	<ul class="nav nav-pills nav-stacked side-nav">
        <li class="{{ setActive('kids') }}"><a href="{{ route('kids') }}">Kids Ministry</a></li>
        <li class="{{ setActive('youth') }}"><a href="{{ route('youth') }}">Youth Ministry</a></li>
        <li class="{{ setActive('college') }}"><a href="{{ route('college') }}">College Ministry</a></li>
        <li class="{{ setActive('sundayschool') }}"><a href="{{ route('sundayschool') }}">Adult Sunday School</a></li>
        <li class="{{ setActive('fellowship') }}"><a href="{{ route('fellowship.index') }}">Home Fellowship Groups</a></li>
	</ul>
</div>