@extends('layouts.master')

@section('content')

<div class="drawer row">
  <div class="col-md-8 col-md-offset-2" style="margin-top: 40px;">
        <div class="owl-carousel">
            <div>
                <a class="clickable latestsermon" href="/bunnyrun" style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url({{ getvideothumb('https://vimeo.com/122325194') }});">
                <p><br/><br/>Special Announcement</p>
                <h1 class="tk-seravek-web">The Bunny Run 5K</h1>
                <p>Sign Up Here</p>
                </a>
            </div>
           <div>
                <a class="clickable latestsermon" href="{{ route('sermons.show', $prevsermon->slug) }}" style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url({{ getvideothumb($prevsermon->video) }});">
                <p>Watch Latest Sermon</p>
                <h1 class="tk-seravek-web">{{ $prevsermon->title }}</h1>
                <p><i class="glyphicon glyphicon-play-circle"></i></p>
                </a>
          </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
  $(".owl-carousel").owlCarousel(
    {
        items: 1,
        loop: true,
        autoplay: true,
        lazyLoad: true,
        center: true,
        smartSpeed: 1000,
    });
})
</script>

<div class="row drawer">
  <div class="col-md-1"></div>

  @foreach($blogs->reverse() as $blog)
  <div class="col-md-2 col-md-offset-1">
    <a class="clickable featuredblog" href="{{ route('blog.show', $blog->slug) }}" style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url({{ $blog->thumbnail }});">
      <h4 class="tk-seravek-web">{{ $blog->title }}</h4>
    </a>
    <h4 style="color: #fff; text-align: left">
      <a class="clickable" style="color: #fff" href="{{ route('blog.show', $blog->slug) }}">{{ $blog->title }}</a>
    </h4>
  </div>
  @endforeach

  <div class="col-md-2 col-md-offset-1">
    <a class="clickable" href="{{ route('read.index') }}" style="display: block; text-transform: uppercase; color: #fff; padding: 10px; border: 4px #ddd solid; width: 100%; height: 105px; background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(http://photos.compasshb.com/PhotoArchive/Worship-Services/Face-to-Face-Fellowship-122114/i-gjr7gvv/0/S/141221_WOR_SS-030-S.jpg); background-size: cover;">
      <h4 class="tk-seravek-web">Scripture of the Day</h4>
    </a>
    <h4 style="color: #fff; text-align: left">
      <a class="clickable" style="color: #fff" href="{{ route('read.index') }}">{{ $passage->title }}</a>
    </h4>
  </div>
<br/><br/>
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
    </div>
    <div class="col-md-4 text-center" style="">
      <h2 class="tk-seravek-web">Directions</h2>
      <br/>
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d212337.23819364296!2d-118.04023200000005!3d33.740779999999994!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80dd25f2e1f15bbd%3A0x2b2a43000587dfc0!2s5082+Argosy+Ave%2C+Huntington+Beach%2C+CA+92649!5e0!3m2!1sen!2sus!4v1425366656204" width="300" height="275" frameborder="0" style="border:0"></iframe>
    </div>
    <div class="col-md-4 text-center">
      <h2 class="tk-seravek-web">Midweek</h2>
      <br/>
      <h4><a href="{{ route('fellowship.index') }}">Home Fellowship Groups</a></h4>
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
        <h2 class="tk-seravek-web"><a href="{{ route('sermons.index') }}">Sermons</a></h2>
        @foreach($sermons as $sermon)
        <div class="col-sm-6 col-md-3">
            <div class="thumbnail">
                <img src="{{ $sermon->othumbnail }}" alt="{{ $sermon->title }}"/>
                <div class="caption">
                    <h4>{{ $sermon->title }}</h4>
                    <p><small>{{ date_format($sermon->published_at, 'F n') }}</small><br/>
                    {{ $sermon->text }}</p>
                    <p><a href="{{ route('sermons.show', $sermon->slug) }}" class="btn btn-primary" role="button">Watch</a></p>
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
                <img src="{{ $video->othumbnail }}" alt="{{ $video->title }}"/>
                <div class="caption">
                    <h4>{{ $video->title }}</h4>
                    <p><small>{{ date_format($video->published_at, 'F n') }}</small></p>
                    <p><a href="{{ route('blog.show', $video->slug) }}" class="btn btn-primary" role="button">Watch</a></p>
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
