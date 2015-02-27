@extends('layouts.master')

@section('content')
<div class="row drawer">
  <div class="col-md-8 col-md-offset-2" style="margin-top: 40px;">
    <a class="clickable latestsermon" href="/{{ date_format($sermons[0]->post_date, 'Y') }}/{{ date_format($sermons[0]->post_date, 'm') }}/{{ $sermons[0]->post_name }}" style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url({{ getvideothumb($sermons[0]->meta->video_oembed) }});">
      <p>Watch Latest Sermon</p>
      <h1 class="tk-seravek-web">{{ $sermons[0]->post_title }}</h1>
      <p><i class="glyphicon glyphicon-play-circle"></i></p>
    </a>
  </div>
</div>

<div class="row drawer">
  <div class="col-md-1"></div>

  @foreach($blogs as $blog)
  <div class="col-md-2 col-md-offset-1">
    <a class="clickable featuredblog" href="/{{ date_format($blog->post_date, 'Y') }}/{{ date_format($blog->post_date, 'm') }}/{{ $blog->post_name }}" style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url({{ $blog->attachment[0]->guid }});">
      <h4 class="tk-seravek-web">{{ $blog->attachment[0]->post_title }}</h4>
    </a>
    <h4 style="color: #fff; text-align: left">
      <a class="clickable" style="color: #fff" href="/{{ date_format($blog->post_date, 'Y') }}/{{ date_format($blog->post_date, 'm') }}/{{ $blog->post_name }}">{{ $blog->post_title }}</a>
    </h4>
  </div>
  @endforeach

  <div class="col-md-2 col-md-offset-1">
    <a class="clickable" href="/read/" style="display: block; text-transform: uppercase; color: #fff; padding: 10px; border: 4px #ddd solid; width: 100%; height: 105px; background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(http://photos.compasshb.com/PhotoArchive/Worship-Services/Face-to-Face-Fellowship-122114/i-gjr7gvv/0/S/141221_WOR_SS-030-S.jpg); background-size: cover;">
      <h4 class="tk-seravek-web">Scripture of the Day</h4>
    </a>
    <h4 style="color: #fff; text-align: left">
      <a class="clickable" style="color: #fff" href="/read/">{{ $reading[0]->post_title }}</a>
    </h4>
  </div>

</div>

<!-- Directions -->
<div class="row" style="background: none; background-color: #f7f7f7; padding-top: 30px; padding-bottom: 30px;">
  <div class="col-sm-10 col-sm-offset-1">
    <div class="col-md-4 text-center">
      <h2>Weekends</h2>
      <p>9am - Sunday School</p>
      <p>11am - Main Service</p>
      <p>&nbsp;</p>
      <p>This Weekend...<br/>{{ $upcomingsermon[0]->post_title }} &mdash; {{ $upcomingsermon[0]->meta->sermon_text }}</p>
      <p>Pastor {{ $upcomingsermon[0]->meta->byline }}</p>
      <a href="{{ $upcomingsermon[0]->meta->worksheet }}" class="btn btn-default">Worksheet</a>
      <a href="{{ $upcomingsermon[0]->meta->announcements }}" class="btn btn-default">Announcements</a>
    </div>
    <div class="col-md-4 text-center">
      <h2>Midweek</h2>
      <p>Awana and Home Fellowship Groups</p>
      <p><a href="/fellowship" class="btn btn-default">Home Fellowship Groups</a></p>
    </div>
    <div class="col-md-4 text-center" style="">
      <h2>Directions</h2>
      <p>5082 Argosy Avenue</p>
      <p>Huntington Beach, CA 92649</p><br/>
      <p><a class="btn btn-default" href="https://www.google.com/maps/place/5082+Argosy+Ave,+Huntington+Beach,+CA+92649/@33.7407795,-118.0402322,17z/data=!3m1!4b1!4m2!3m1!1s0x80dd25f2e1f15bbd:0x2b2a43000587dfc0" role="button">View Map</a></p>
    </div>    
  </div>
</div>


<!-- Parallax -->
<div class="row">
    <div style="background-image: url(http://photos.compasshb.com/PhotoArchive/Worship-Services/1st-Service-New-Building-01111/i-KLP4pcT/2/X2/150111_Wor_SS-093-X2.jpg);padding-top: 250px; background-attachment: fixed; background-position: 50% 0px; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover; background-repeat: no-repeat;"></div>
</div>

<!-- Recent Sermons -->
<div class="row" style="background: none; background-color: #fff; padding-bottom: 20px;">
    <div class="col-xs-10 col-xs-offset-1">
        <h2>Recent Sermons</h2>
        <p><a href="/learn">View All</a></p>

        @foreach($sermons as $sermon)
        <div class="col-sm-6 col-md-3">
            <div class="thumbnail">
                <img src="...feature_image..." alt="..."/>
                <div class="caption">
                    <h3>{{ $sermon->post_title }}</h3>
                    <p>{{ $sermon->attachment }} {{ $sermon->meta->byline }}, ID, Date, Summary, {{ $sermon->meta->sermon_text }}</p>
                    <p><a href="#" class="btn btn-primary" role="button">Watch</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>


<!-- Recent Videos -->
<div class="row" style="background: none; background-color: #dddddd; padding-bottom: 20px;">
    <div class="col-xs-10 col-xs-offset-1">
        <h2>Recent Videos</h2>

        @foreach($blogs as $blog)
        <div class="col-sm-6 col-md-6">
            <div class="thumbnail">
                <img src="{{ $blog->attachment[0]->guid }}" alt="..."/>
                <div class="caption">
                    <h3>{{ $blog->post_title }}</h3>
                    <p>Preacher, ID, {{ $blog->post_date }}, Summary</p>
                    <p><a href="#" class="btn btn-primary" role="button">Watch</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                </div>
            </div>
        </div>
        @endforeach
    
    </div>
</div>

<!-- Recent Photography / SmugMug -->
<div class="row" style="background: none; padding-bottom: 40px;">
  <div class="col-xs-10 col-xs-offset-1">
    <div class="col-md-8">
        <h2>Recent Photography</h2>
        <?php /*
        $results = apply_filters('chb_feed_smugmug', $results);
        foreach ($results as $result) {
            */ ?>
        <div class="col-md-6" style="padding-bottom: 10px">
            <a href="***result0"><img src="***result1" style="height: 175px;"></a>
        </div>
        <?php // } ?>
    </div>
    <div class="col-md-4">
         <h2>Recent Tweets</h2>
         <a class="twitter-timeline" height="300" data-dnt="true" href="https://twitter.com/BradMSmith/lists/compasshb" data-widget-id="566872417012690945" data-chrome="noheader transparent">Tweets from https://twitter.com/BradMSmith/lists/compasshb</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    </div>
</div>
<br/><br/>&nbsp;<br/><br/>
</div>
</div>

<!-- Instagram -->
<div class="row" style="background: none; background-color: #fff; padding-bottom: 20px;">
    <div class="col-xs-10 col-xs-offset-1">
        <h2>Instagram</h2>

        @foreach($sermons as $sermon)
        <div class="col-sm-6 col-md-3">
            <div class="thumbnail">
                <img src="...feature_image..." alt="..."/>
            </div>
        </div>
        @endforeach
    
    </div>
</div>

@stop