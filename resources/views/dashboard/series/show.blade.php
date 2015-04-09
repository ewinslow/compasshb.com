@extends('layouts.dashboard.master'))

@section('content')

	<h1 class="tk-seravek-web">{{ $series->title }}</h1>
  {!! $series->body !!}

@endsection
