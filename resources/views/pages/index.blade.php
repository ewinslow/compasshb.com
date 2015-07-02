@extends('layouts.master')

@section('content')

<div class="drawer row">
  <div class="col-md-8 col-md-offset-2" style="margin-top: 30px;">
           <div>
                <a class="clickable latestsermon" href="{{ route('sermons.show', $prevsermon->slug) }}" style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url({{ $prevsermon->othumbnail }});     background-position: center;">
                <p>Watch Latest Sermon</p>
                <h1 class="tk-seravek-web">{{ $prevsermon->title }}</h1>
                <p>{{{ $prevsermon->series->title or '' }}}</p>
                <p><i class="glyphicon glyphicon-play-circle large-icon"></i></p>
                </a>
          </div>
    </div>
</div>

<div class="row drawer" style="padding-bottom: 30px">
  <div class="col-md-1"></div>

  @foreach(array_slice($fevents, 0,2) as $event)
  <div class="col-md-2 col-md-offset-1" style="margin-top: 10px">
    <a class="clickable featuredblog" href="/events/{{ $event->id }}/{{ str_slug($event->name->text, "-") }}/" style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url({{ $event->logo->url }});">
      <h4 class="tk-seravek-web">{{ $event->name->text }}</h4>
      <p> {{ date("F j", strtotime($event->start->local)) }}</p>
    </a>
  </div>
  @endforeach

  <div class="col-md-2 col-md-offset-1" style="margin-top: 10px">
    <a class="clickable" href="{{ route('read.index') }}" style="display: block; text-transform: uppercase; color: #fff; padding: 10px; border: 4px #ddd solid; width: 100%; height: 105px; background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(https://compasshb.smugmug.com/PhotoArchive/Worship-Services/Face-to-Face-Fellowship-122114/i-gjr7gvv/0/S/141221_WOR_SS-030-S.jpg); background-size: cover;">
      <h4 class="tk-seravek-web">Scripture of<br/> the Day</h4>
      <p>{{ $passage->title }}</p>
    </a>
  </div>
<br/><br/>
</div>

<div class="row" style="background: none; background-color: #497f9e; padding-top: 0px; padding-bottom: 15px; border-top: 3px solid #fff;">
  <div class="col-sm-10 col-sm-offset-1">
    <center>
    <h3 style="color: #FFF; text-align: center; margin-bottom: 5px" class="tk-seravek-web">Compass HB exists to make disciples of Jesus Christ</h3>
    <p style="color: #FFF; font-size: 1.25em">by <strong>reaching</strong> as many people as possible for Christ, <strong>teaching</strong> them to be like Christ, and <strong>training</strong> them to serve Christ.</p>
    </center>
  </div>
</div>

{{-- Directions --}}
<div class="row" style="background: none; background-color: #f7f7f7; padding-top: 30px; padding-bottom: 30px;">
  <div class="col-sm-10 col-sm-offset-1">
    <div class="col-md-4 text-center">
      <h2 class="tk-seravek-web">Sundays at<br/> 9am and 11am</h2>
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
      <br/>
      <h4><a href="{{ route('kids') }}#awana">Awana for kids</a></h4>
      <p>Wednesday</p>
      <br/>
      <h4><a href="{{ route('youth') }}">The United for Youth</a></h4>
      <p>Thursday</p>
    </div>
  </div>
</div>


{{-- Parallax --}}
<div class="row">
    <div style="background-image: url(https://compasshb.smugmug.com/PhotoArchive/Worship-Services/1st-Service-New-Building-01111/i-KLP4pcT/2/X2/150111_Wor_SS-093-X2.jpg);padding-top: 250px; background-attachment: fixed; background-position: 50% 0px; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover; background-repeat: no-repeat;"></div>
</div>

{{-- Recent Sermons --}}
<div class="row" style="background: none; background-color: #fff; padding-bottom: 20px;">
    <div class="col-xs-10 col-xs-offset-1">
        <h2 class="tk-seravek-web"><a href="{{ route('sermons.index') }}">Sermons</a></h2>
        @foreach($sermons as $sermon)
        <div class="col-sm-6 col-md-3">
            <div class="thumbnail">
                <img data-src="{{ $sermon->othumbnail }}" class="lazyload" alt="{{ $sermon->title }}"/>
                <div class="caption">
                    <h4>{{ $sermon->title }}</h4>
                    <p><small>{{ date_format($sermon->published_at, 'F j, Y') }}</small><br/>
                    {{ $sermon->text }}</p>
                    <p><a href="{{ route('sermons.show', $sermon->slug) }}" class="btn btn-primary" role="button">Watch</a></p>
                </div>
            </div>
        </div>
        @endforeach
        <div class="col-sm-6 col-md-3">
            <div class="thumbnail">
                <center><span class="glyphicon {{ $distinctives[0]['icon'] }}" style="font-size: 5em; padding: 25px;"></span></center>
                <div class="caption">
                    <h4>{{ $distinctives[0]['text'] }}</h4><br/>
                    <p><a href="{{ route('distinctives') }}" class="btn btn-primary" role="button">Our Eight Distinctives</a></p>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- Recent Videos --}}
<div class="row" style="background: none; background-color: #dddddd; padding-bottom: 20px;">
    <div class="col-xs-10 col-xs-offset-1">
        <h2 class="tk-seravek-web"><a href="{{ route('blog.index') }}">Videos</a></h2>

        @foreach($videos as $video)
        <div class="col-sm-6 col-md-6">
            <div class="thumbnail">
                <img data-src="{{ $video->othumbnail }}" class="lazyload" alt="{{ $video->title }}"/>
                <div class="caption">
                    <h4>{{ $video->title }}</h4>
                    <p><small>{{ date_format($video->published_at, 'F j, Y') }}</small></p>
                    <p><a href="{{ route('blog.show', $video->slug) }}" class="btn btn-primary" role="button">Watch</a></p>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>

{{-- Photos --}}
<div class="row">
    <div class="col-xs-10 col-xs-offset-1">
        <h2 class="tk-seravek-web"><a href="{{ route('photos') }}">Photos</a></h2>

        @foreach($images as $image)
        <div class="col-md-3" style="padding-bottom: 10px">
            <a href="{{ $image[0] }}"><img data-src="{{ $image[1] }}" class="lazyload" style="height: 175px;" alt="photos.compasshb.com"></a>
        </div>
        @endforeach
    </div>
</div>

{{-- Social Media --}}
<div class="row" style="background: none; background-color: #fff; padding-bottom: 40px;">
  <div class="col-xs-10 col-xs-offset-1">
    <div class="col-md-5">
            <h2 class="tk-seravek-web"><a href="https://www.facebook.com/CompassHB">Facebook</a></h2>
      <div class="fb-like-box" data-href="https://www.facebook.com/CompassHB" data-colorscheme="light" data-show-faces="false" data-header="false" data-stream="true" data-show-border="false"></div>
    </div>
    <div class="col-md-7">
        <h2 class="tk-seravek-web"><a href="https://www.twitter.com/compasshb">Tweets</a></h2><br/>
        <a class="twitter-timeline" data-dnt="true" href="https://twitter.com/BradMSmith/lists/compasshb" data-widget-id="566872417012690945" data-chrome="noheader">Tweets from https://twitter.com/BradMSmith/lists/compasshb</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>    </div>
</div>
<br/><br/>&nbsp;<br/><br/>
</div>

{{-- Instagram --}}
<div class="row" style="background: none; background-color: #fff; padding-bottom: 20px;">
    <div class="col-xs-10 col-xs-offset-1">
        <h2 class="tk-seravek-web"><a href="https://www.instagram.com/compasshb">Instagram</a></h2>

        @foreach($instagrams as $instagram)
        <div class="col-sm-6 col-md-3">
            <div class="thumbnail">
              <a href="{{ $instagram['link'] }}">
                <img data-src="{{ $instagram['images']['standard_resolution']['url'] }}" class="lazyload" alt="Compass HB Instagram"/>
              </a>
              <p style="padding: 10px">{{ $instagram['caption']['text'] }} </p>
            </div>
        </div>
        @endforeach

    </div>
</div>

@stop
