@extends('layouts.master')

@section('content')
</div>

<div class="container">

    <h1 class="tk-seravek-web">Photos</h1>

    <div class="row">
        @foreach ($photos as $photo)
          <div class="col-xs-6 col-md-3">
            <a href="{{ $photo[0] }}" class="thumbnail">
              <img src="{{ $photo[1] }}" alt="compasshb.com/photos">
            </a>
          </div>
        @endforeach
    </div>

    <p>View more photos at <a href="http://photos.compasshb.com/">http://photos.compasshb.com/</a></p>
</div>
@stop