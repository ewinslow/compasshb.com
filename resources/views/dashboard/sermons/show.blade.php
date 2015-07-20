@extends('layouts.dashboard.master')

@section('content')

	<h1 class="tk-seravek-web">{{ $sermon->title }}</h1>
  <p>{{{ $sermon->series->title or '' }}}</p>

  <div class="videocontainer">{!! $sermon->iframe !!}</div>
  <p>Text: {!! $sermon->text !!}</p>
  <p>
  @if ($sermon->worksheet != null)
  <a href="{{ $sermon->worksheet }}" class="btn btn-default">Worksheet</a>
  @endif
  </p>
  <p>{!! $sermon->excerpt !!}</p>

  <p>{{ $texttrack }}</p>

  @unless($texttrack)
  <p>{!! $sermon->body !!}</p>
  @endunless

  <p>Volunteer to transcribe or translate this <a href="http://transcribe.compasshb.com:8000">video here</a>.</p>
@endsection


@section('sidebar')

  @include('dashboard.sermons.sidebar')

@endsection
