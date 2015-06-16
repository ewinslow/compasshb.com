@extends('layouts.dashboard.master')

@section('content')
<link rel="canonical" href="{{ route('read.show', $passages->first()->slug) }}/" />
<h1 class="tk-seravek-web">{{ $passage->title }}</h1>


<p>
  {{ Lang::choice('passages.active_users_count', $analytics['activeUsers']) }}
  {{ Lang::choice('passages.daily_sessions_count', $analytics['sessions']) }}
</p>

<script>
var DailyReading = {
  getAudioHref: function () {
    var as = document.getElementsByTagName('a');
    for (var i = 0; i < as.length; i++) {
      var href = as[i].href;
      if (href.indexOf('esvmedia.org') != -1) {
        return href;
      }
    }
  },

  getSibling: function () {
    return document.getElementsByClassName('tk-seravek-web')[0].nextSibling.nextSibling;
  },

  getParent: function () {
    return DailyReading.getSibling().parentNode;
  },

  insertNode: function (node) {
    DailyReading.getParent().insertBefore(node, DailyReading.getSibling());
  },

  clearSecondTitle: function () {
    var x = document.getElementsByTagName('h2')[0];
    if (x != null) 
      x.remove();
  },

  insertAudioNode: function () {
    var audioNode = document.createElement('audio');
    audioNode.src = DailyReading.getAudioHref();
    audioNode.controls = 'controls';
    DailyReading.insertNode(audioNode);
  },

  prepareReading: function () {
    DailyReading.insertAudioNode();
    DailyReading.clearSecondTitle();
  }
};

DailyReading.prepareReading();
</script>

  {!! $postflash !!}
  {!! $passage->body !!}
  {!! $passage->verses !!}

	@include('dashboard.passages.comments')

@endsection


@section('sidebar')

  @include('dashboard.passages.sidebar')

@endsection
