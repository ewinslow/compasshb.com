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
    <a class="clickable" href="{{ route('read') }}" style="display: block; text-transform: uppercase; color: #fff; padding: 10px; border: 4px #ddd solid; width: 100%; height: 105px; background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(http://photos.compasshb.com/PhotoArchive/Worship-Services/Face-to-Face-Fellowship-122114/i-gjr7gvv/0/S/141221_WOR_SS-030-S.jpg); background-size: cover;">
      <h4 class="tk-seravek-web">Scripture of the Day</h4>
    </a>
    <h4 style="color: #fff; text-align: left">
      <a class="clickable" style="color: #fff" href="{{ route('read') }}">{{ $reading[0]->post_title }}</a>
    </h4>
  </div>

</div>

<!-- Directions -->
<div class="row" style="background: none; background-color: #f7f7f7; padding-top: 30px; padding-bottom: 30px;">
  <div class="col-sm-10 col-sm-offset-1">
    <div class="col-md-4 text-center">
      <h2 class="tk-seravek-web">Sundays at 11am</h2>
      <br/>
      <p>5082 Argosy Avenue</p>
      <p>Huntington Beach, CA 92649</p>
      <br/>
      <p>Upcoming Sermon<br/>{{ $upcomingsermon[0]->post_title }} &mdash; {{ $upcomingsermon[0]->meta->sermon_text }}</p>
      <p>Pastor {{ $upcomingsermon[0]->meta->byline }}</p>
      <a href="{{ $upcomingsermon[0]->meta->worksheet }}" class="btn btn-default">Worksheet</a>
      <a href="{{ $upcomingsermon[0]->meta->announcements }}" class="btn btn-default">Announcements</a>
    </div>
    <div class="col-md-4 text-center" style="">
      <h2 class="tk-seravek-web">Directions</h2>
      <br/>
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d212337.23819364296!2d-118.04023200000005!3d33.740779999999994!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80dd25f2e1f15bbd%3A0x2b2a43000587dfc0!2s5082+Argosy+Ave%2C+Huntington+Beach%2C+CA+92649!5e0!3m2!1sen!2sus!4v1425366656204" width="300" height="275" frameborder="0" style="border:0"></iframe>
    </div>    
    <div class="col-md-4 text-center">
      <h2 class="tk-seravek-web">Midweek</h2>
      <br/>
      <h4><a href="{{ route('fellowship') }}">Home Fellowship Groups</a></h4>
      <p>Tuesday, Wednesday, Thursday, and Friday</p>
      <h4><a href="{{ route('kids') }}#awana">Awana for kids</a></h4>
      <p>Wednesday</p>
      <h4><a href="{{ route('youth') }}">The United for Youth</a></h4>
      <p>Thursday</p>
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
        <h2 class="tk-seravek-web"><a href="{{ route('sermons') }}">Sermons</a></h2>
        @foreach($sermons as $sermon)
        <div class="col-sm-6 col-md-3">
            <div class="thumbnail">
                <img src="{{ $sermon->othumbnail }}" alt="{{ $sermon->post_title }}"/>
                <div class="caption">
                    <h4>{{ $sermon->post_title }}</h4>
                    <p><small>{{ date_format($sermon->post_date, 'F n') }}</small><br/>
                    {{ $sermon->meta->sermon_text }}</p>
                    <p><a href="/{{ date_format($sermon->post_date, 'Y') }}/{{ date_format($sermon->post_date, 'm') }}/{{ $sermon->post_name }}" class="btn btn-primary" role="button">Watch</a></p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


<!-- Recent Videos -->
<div class="row" style="background: none; background-color: #dddddd; padding-bottom: 20px;">
    <div class="col-xs-10 col-xs-offset-1">
        <h2 class="tk-seravek-web"><a href="{{ route('videos') }}">Videos</a></h2>

        @foreach($videos as $video)
        <div class="col-sm-6 col-md-6">
            <div class="thumbnail">
                <img src="{{ $video->othumbnail }}" alt="{{ $video->post_title }}"/>
                <div class="caption">
                    <h4>{{ $video->post_title }}</h4>
                    <p><small>{{ date_format($video->post_date, 'F n') }}</small></p>
                    <p><a href="/{{ date_format($video->post_date, 'Y') }}/{{ date_format($video->post_date, 'm') }}/{{ $video->post_name }}" class="btn btn-primary" role="button">Watch</a></p>
                </div>
            </div>
        </div>
        @endforeach
    
    </div>
</div>

<!-- Recent Photography / SmugMug -->
<div class="row" style="background: none; background-color: #fff; padding-bottom: 40px;">
  <div class="col-xs-10 col-xs-offset-1">
    <div class="col-md-8">
        <h2 class="tk-seravek-web"><a href="{{ route('photos') }}">Photos</a></h2>

        @foreach($images as $image)
        <div class="col-md-6" style="padding-bottom: 10px">
            <a href="{{ $image[0] }}"><img src="{{ $image[1] }}" style="height: 175px;" alt="photos.compasshb.com"></a>
        </div>
        @endforeach
    </div>
    <div class="col-md-4">
         <h2 class="tk-seravek-web"><a href="http://www.twitter.com/compasshb">Tweets</a></h2>
         <a class="twitter-timeline" height="400" data-dnt="true" href="https://twitter.com/BradMSmith/lists/compasshb" data-widget-id="566872417012690945" data-chrome="noheader transparent">Tweets from https://twitter.com/BradMSmith/lists/compasshb</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    </div>
</div>
<br/><br/>&nbsp;<br/><br/>
</div>

<!-- Instagram -->
<div class="row" style="background: none; background-color: #fff; padding-bottom: 20px;">
    <div class="col-xs-10 col-xs-offset-1">
        <h2 class="tk-seravek-web"><a href="http://www.instagram.com/compasshb">Instagram</a></h2>

        @foreach($instagrams as $instagram)
        <div class="col-sm-6 col-md-3">
            <div class="thumbnail">
              <a href="{{ $instagram['link'] }}">
                <img src="{{ $instagram['images']['standard_resolution']['url'] }}" alt="Compass HB Instagram"/>
              </a>
              <p style="padding: 10px">{{ $instagram['caption']['text'] }} </p>
            </div>
        </div>
        @endforeach
    
    </div>
</div>

@stop