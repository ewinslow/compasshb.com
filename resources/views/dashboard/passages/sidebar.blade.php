<br/><br/>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title tk-seravek-web">Scripture of the Day</h3>
  </div>
  <div class="panel-body">
    <p>Read through a portion of scripture each day with your church family. Be encouraged by reading others' comments and leave your own.</p>
    <p>New content is posted Monday through Friday of each week.</p>
    <p>
      <a href="http://feeds.compasshb.com/read">Podcast</a>
      <a href="https://www.facebook.com/sharer/sharer.php?app_id=386571371526429&sdk=joey&u=https%3A%2F%2Fwww.compasshb.com%2Fread&display=popup&ref=plugin&src=share_button">Facebook</a>
      <a href="https://twitter.com/intent/tweet?url=https%3A%2F%2Fwww.compasshb.com%2Fread&original_referer=https%3A%2F%2Fwww.compasshb.com%2Fread">Tweet</a>
      <a href="{{ route('feed.read.xml') }}">RSS</a>
    </p>
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
