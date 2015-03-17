@extends('layouts.dashboard')

@section('content')
<link rel="canonical" href="http://www.compasshb.com/{{ route('read.show', $passages->first()->slug) }}/" />
<h1 class="tk-seravek-web">Scripture of the Day</h1>
<div class="alert alert-info" role="alert">This section is being updated. Some comments may not show up while this page is being migrated. If you left a comment earlier today it is not lost and will show up soon. New comments can be added while this work is going on.</div>
  {!! $postflash !!}
  {!! $passage->body !!}
  {!! $passage->verses !!}

	@include('passages.comments');

@endsection


@section('sidebar')

  @include('passages.sidebar')

@endsection
