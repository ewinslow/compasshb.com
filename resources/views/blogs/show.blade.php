@extends('layouts.dashboard')

@section('content')

	<h1 class="tk-seravek-web">{{ $blog->title }}</h1>
  {!! $blog->body !!}

@endsection


@section('sidebar')

  @include('blogs.sidebar')

@endsection
