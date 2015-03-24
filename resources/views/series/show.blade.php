@extends('layouts.dashboard')

@section('content')

	<h1 class="tk-seravek-web">{{ $series->title }}</h1>
  {!! $series->body !!}

@endsection


@section('sidebar')

  @include('series.sidebar')

@endsection
