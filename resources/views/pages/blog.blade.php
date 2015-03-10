@extends('layouts.master')

@section('content')
</div>

<article class="container-fluid" style="margin-bottom: 30px">
  <section class="row" style="background-image:  linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/images/header-entry.jpg'); background-size: cover; background-position: center">
    <div class="col-xs-11 col-xs-offset-1" style="padding-top: 60px;" >
      <h1 class="tk-seravek-web" style='color: #fff; padding: 10px 3px; text-transform: uppercase '>{{ $title }}</h1>
      <p class="lead" style="color: #fff; margin-top: -20px">{{ $post->first()->taxonomies[1]->term->name }}</p>
    </div>
  </section>
  <section class="row">
    <div class="col-md-7 col-md-offset-1" style="background-color: #fff; border: 1px solid #E4E4E4; padding: 20px; margin-top: 20px">
      <p style='text-transform: uppercase; font-size: .9rem;'><span style="padding-right: 20px;">{{ date_format($post->first()->post_date, 'Y-m-d') }} <a href="{{ $post->first()->meta->sermon_worksheet }}">Worksheet</a> <a href="{{ $post->first()->meta->sermon_announcements }}">Announcements</a></span></p>

        <div class="videocontainer">
          {!! $post->first()->oembedhtml !!}
        </div>

      <p>{!! $post->first()->post_content !!}</p>
      <hr/>
      <p><a href="/sermons" class="btn btn-default">View All</a></p>
    </div>
    <aside class="col-md-2 col-md-offset-1" role="complementary" style="background-color: #fff; border: 1px solid #E4E4E4; margin-top: 20px; padding: 20px;">
      <h4 class="tk-seravek-web">Browse Sermons</h4>
      <ul class="list-unstyled">
        <li><a href="/sermons/">By Scripture</a></li>
      </ul>
      <br/>
      <a href="https://itunes.apple.com/us/podcast/compass-hb-sermons/id938965423" target="_blank">
        <img src="http://www.compasshb.com/app/uploads/2014/11/Subscribe_on_iTunes_Badge_US-UK_110x40_0824.png"
        width="110" height="40" alt="Subscribe on iTunes"/>
      </a>
      <br/><br/>
      <a href="http://feeds.compasshb.com/sermons">Subscribe via Feed</a>
    </aside>
  </section>
</article>

<div class="container-fluid">
@endsection

@section('sidebar')
@endsection
