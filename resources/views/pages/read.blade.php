@extends('layouts.dashboard')

@section('content')
<link rel="canonical" href="http://www.compasshb.com/{{ date_format($post[0]->post_date, 'Y') }}/{{ date_format($post[0]->post_date, 'm') }}/{{ $post[0]->post_name }}/" />
  {!! $postflash !!}
  {!! $content !!}
<br/><hr/><br/>
<div id="disqus_thread"></div>
<script type="text/javascript">
    /* * * CONFIGURATION VARIABLES * * */
    var disqus_shortname = 'compasshb';
    var disqus_url = 'http://www.compasshb.com/{{ date_format($post[0]->post_date, 'Y') }}/{{ date_format($post[0]->post_date, 'm') }}/{{ $post[0]->post_name }}/';

    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function() {
        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
</script>
@endsection


@section('sidebar')
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title tk-seravek-web">About Scripture of the Day</h3>
  </div>
  <div class="panel-body">
    <p>Read through a portion of scripture each day with your church family. Be encouraged by reading others' comments and leave your own.</p>
    <p>New content is posted Monday through Friday of each week.</p>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title tk-seravek-web">Cross References</h3>
  </div>
  <div class="panel-body">
    <p>See these sermons and articles for other content on this site that references this chapter.</p>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title tk-seravek-web">This Week's Schedule</h3>
  </div>
  <div class="panel-body">
    <ul>
    @foreach ($post as $p)
      <li><a href="/{{ date_format($p->post_date, 'Y') }}/{{ date_format($p->post_date, 'm') }}/{{ $p->post_name }}/">{{ $p->post_title }}</a></li>
    @endforeach
    </ul>
  </div>
</div>

<p><a href="http://feeds.compasshb.com/read" class="feedpress-button" name="feed-9178">Subscribe to Podcast</a></p>
<script src="//static.feedpress.it/js/button.js" async></script>

@endsection
