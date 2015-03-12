@extends('layouts.dashboard')

@section('content')
<h1 class="tk-seravek-web">Home Fellowship Groups</h1>

{{--
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title tk-seravek-web">Application Questions</h3>
  </div>
  <div class="panel-body">
    <p>Before you begin answering these questions, please re-read our text of 1 Thessalonians 3:9-13 and review the points from the other side of this handout.</p>
    <ol>
      <li>Why is it so hard for God’s people to pray today?</li>
      <li>Read Psalm 116:12-13. Spend some time thanking God for who he is and what he has done in your life and in the life of our church in these recent weeks.</li>
      <li>Read 2 Thessalonians 1:3-4. Here we see that Paul’s prayer in our passage was answered. Share some examples of how God has answered your prayers.</li>
      <li>Read Matthew 6:5-8. What is your strategy to make sure you spend time praying to God every day?</li>
      <li>Who is someone specifically you are going to pray for this week?</li>
    </ol>
  </div>
</div>
--}}

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title tk-seravek-web">Groups</h3>
  </div>
  <div class="panel-body">
    @foreach ($days as $day)
      <h4 class="tk-seravek-web">{{ $day }}</h4>
      <ul class="list-unstyled">
        @foreach ($fellowships as $fellowship)
          @if ($fellowship['day'] == $day)
            <li>{{ $fellowship['title'] }} @ {{ $fellowship['location'] }}
              {{ (isset($fellowship['description'])) ? $fellowship['description'] : '' }}</li>
          @endif
        @endforeach
      </ul>
      @endforeach
  </div>
</div>

{{--
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title tk-seravek-web">Recommended Reading</h3>
  </div>
  <div class="panel-body">
    <p>The Power of Prayer by R. A. Torrey - Pick up a copy in our book nook today!</p>
  </div>
</div>
--}}
@endsection


@section('sidebar')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title tk-seravek-web">About</h3>
  </div>
  <div class="panel-body">
    <p>{{-- These questions are designed for the application of this week's sermon. Take some time to thoughtfully write out the answers. It is also helpful to discuss in a home fellowship group.--}} If you would like more information on a home fellowship group, email info@compassHB.com.</p>
    <p><a href="mailto:info@compasshb.com" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span>  Sign Up</a></p>
    <p>Click <a href="{{ route('sermons') }}">here</a> to watch the latest sermon and get this week's worksheet.</p>
  </div>
</div>

@endsection
