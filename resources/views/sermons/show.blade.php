@extends('layouts.dashboard')

@section('content')

	<h1 class="tk-seravek-web">{{ $sermon->title }}</h1>
  {!! $sermon->body !!}
  {!! $sermon->text !!}

@endsection


@section('sidebar')

  @include('sermons.sidebar')

@endsection