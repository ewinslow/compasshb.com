@extends('layouts.dashboard')

@section('content')

	<h1 class="tk-seravek-web">{{ $sermon->title }}</h1>
	<p>{!! $sermon->iframe !!}</p>
  <p>{!! $sermon->text !!}</p>
  <p>
  @if ($sermon->worksheet != null)
  <a href="{{ $sermon->worksheet }}" class="btn btn-default">Worksheet</a>
  @endif
  </p>
  <p>{!! $sermon->body !!}</p>

@endsection


@section('sidebar')

  @include('sermons.sidebar')

@endsection
