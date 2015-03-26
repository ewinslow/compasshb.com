@extends('layouts.dashboard')

@section('content')
	<link rel="stylesheet" href="https://raw.githubusercontent.com/VodkaBears/Interdimensional/master/dist/interdimensional.css">
	<script src="https://raw.githubusercontent.com/VodkaBears/Interdimensional/master/dist/interdimensional.min.js"></script>
	<script>Interdimensional.charge();</script>

	<h1 class="tk-seravek-web">Scripture of the Day</h1>
  {!! $postflash !!}
  {!! $passage->body !!}
  {!! $passage->verses !!}

	@include('passages.comments');

@endsection


@section('sidebar')

  @include('passages.sidebar')

@endsection
