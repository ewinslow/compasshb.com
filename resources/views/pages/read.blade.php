@extends('layouts.dashboard')

@section('content')
  {!! $postflash !!}
  <p style="float: right"><a href="#">Comments <span class="badge">25</span></a></p>
  {!! $content !!}
@endsection


@section('sidebar')
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">About Scripture of the Day</h3>
  </div>
  <div class="panel-body">
    <p>Read through a portion of scripture each day with your church family. Be encouraged by reading others' comments and leave your own.</p>
    <p>New content is posted Monday through Friday of each week.</p>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">This Week's Schedule</h3>
  </div>            
  <div class="panel-body">
    <ul>
      <li>Monday</li>
      <li>Tuesday</li>
      <li>Wednesday</li>
      <li>Thursday</li>
      <li>Friday</li>                
    </ul>

    <p><a href="http://feeds.compasshb.com/read" class="feedpress-button" name="feed-9178">Subscribe to Compass Bible Church &raquo; Scripture of the Day</a></p><br/>
    <p><span style="padding-right: 20px;"><a href="https://itunes.apple.com/us/podcast/scripture-of-the-day/id945286142">Subscribe to iTunes Podcast</a></span></p>
    <script src="//static.feedpress.it/js/button.js" async></script>
  </div>
</div>

<p><a href="#" onClick="window.external.AddFavorite(location.href, 'read'); return false" class="btn btn-default" >pBookmark Scripture of the Day</a></p>
@endsection