<div class="col-sm-3 col-md-2 sidebar">
  <ul class="nav nav-sidebar">
    <li class="{{ set_active('read') }}">
    	  <a href="{{ route('read') }}">Read {{--<span class="badge disqus-comment-count" data-disqus-url="http://www.compasshb.com/{{ date_format($read[0]->post_date, 'Y') }}/{{ date_format($read[0]->post_date, 'm') }}/{{ $read[0]->post_name }}/" style="display: block; float: right">0</span>--}}</a>
    </li>
    <li class="{{ set_active('pray') }}"><a href="{{ route('pray') }}">Pray</a></li>
    <li class="{{ set_active('sermons') }}"><a href="{{ route('sermons') }}">Sermons</a></li>
    <li class="{{ set_active('songs') }}"><a href="{{ route('songs.index') }}">Worship</a></li>
    <li class="{{ set_active('fellowship') }}"><a href="{{ route('fellowship') }}">Fellowship</a></li>
    <li style="position: absolute; width: 100%; bottom: 0;"><a href="{{ route('home') }}">Home</a></li>
  </ul>
</div>

<script type="text/javascript">
var disqus_shortname = 'compasshb';

/* * * DON'T EDIT BELOW THIS LINE * * */
(function () {
var s = document.createElement('script'); s.async = true;
s.type = 'text/javascript';
s.src = '//' + disqus_shortname + '.disqus.com/count.js';
(document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
}());
</script>
