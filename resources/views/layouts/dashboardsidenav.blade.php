<div class="col-sm-3 col-md-2 sidebar">
  <ul class="nav nav-sidebar">
    <li class="{{ set_active('read') }}">
    	  <a href="{{ route('read') }}">Read <span class="badge" style="display: block; float: right">25</span></a>
    </li>
    <li class="{{ set_active('pray') }}"><a href="{{ route('pray') }}">Pray</a></li>
    <li class="{{ set_active('sermons') }}"><a href="{{ route('sermons') }}">Sermons</a></li>
    <li class="{{ set_active('worship') }}"><a href="{{ route('worship') }}">Worship</a></li>        
    <li class="{{ set_active('fellowship') }}"><a href="{{ route('fellowship') }}">Fellowship</a></li>
    <li style="position: absolute; width: 100%; bottom: 0;"><a href="{{ route('home') }}">Home</a></li>
  </ul>
</div>