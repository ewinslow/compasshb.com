@extends('layouts.dashboard.master')

@section('content')

	<h1 class="tk-seravek-web">Sermons</h1><br/>

  <?php $i = 0; ?>
  @foreach ($sermons as $sermon)
  <div class="col-md-4" {!! ($i % 3) ? '' : 'style="clear: left"' !!}>
    <a href="{{ route('sermons.show', $sermon->slug) }}" style="background-image: url({{ $sermon->image }}); background-size: cover; width: 200px; height: 125px; display: block;"></a>
      <h4 class="tk-seravek-web"><a href="{{ route('sermons.show', $sermon->slug) }}" >{{ $sermon->title }}</a></h4>
      <p>{{ $sermon->text }}<br/>
      {{ date_format($sermon->published_at, 'l, F j, Y') }}<br/>
      {{ $sermon->teacher }}</p>
    </a>
  </div>
  <?php $i++; ?>
  @endforeach

@endsection


@section('sidebar')

  @include('dashboard.sermons.sidebar')

@endsection
