@extends('layouts.dashboard')

@section('content')

	<h1 class="tk-seravek-web">{{ $song->title }}</h1>

	<p>{!! $song->iframe !!}</p>

	<p>{{ $song->body }}</p>

@endsection