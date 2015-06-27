@extends('layouts.dashboard.master')

@section('content')

	<h1 class="tk-seravek-web">Search</h1>

  @include('dashboard.search.form')

  @foreach ($results['hits']['hits'] as $result)
    <p>
      <strong>
        <a href="{{ makeRouteFromSlug($result['_type'], $result['_source']['slug']) }}">{{ $result['_source']['title'] }}</a>
      </strong><br/>
      <small>{{ $result['_type'] }}</small>
    </p>
    @endforeach

@endsection

