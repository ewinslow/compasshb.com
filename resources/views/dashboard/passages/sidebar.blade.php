<br/><br/>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title tk-seravek-web">Scripture of the Day</h3>
  </div>
  <div class="panel-body">
    <p>Read through a portion of scripture each day with your church family. Be encouraged by reading others' comments and leave your own.</p>
    <p>New content is posted Monday through Friday of each week.</p>
  </div>
</div>

{{--<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title tk-seravek-web">Cross References</h3>
  </div>
  <div class="panel-body">
    <p>See these sermons and articles for other content on this site that references this chapter.</p>
  </div>
</div>--}}

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title tk-seravek-web">This Week</h3>
  </div>
  <div class="panel-body">
    <ul>
    @foreach ($passages as $passage)
      <li><a href="{{ route('read.show', $passage->slug) }}">{{ $passage->title }}</a></li>
    @endforeach
    </ul>
  </div>
</div>

<p><a href="http://feeds.compasshb.com/read" class="feedpress-button" name="feed-9178">Subscribe to Podcast</a></p>
<script src="//static.feedpress.it/js/button.js" async></script>
<p><div class="fb-share-button" data-href="{{ URL::to('/') }}/read" data-layout="button_count"></div></p>
<p><a href="https://twitter.com/share" class="twitter-share-button" data-via="CompassHB" data-dnt="true">Tweet</a></p>
<p><a href="{{ route('feed.read.xml') }}">RSS</a></p>
