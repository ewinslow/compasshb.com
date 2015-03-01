@extends('layouts.dashboard')

@section('content')
<h1 class="page-header">Scripture Index</h1>

<div class="row">
  <div class="col-md-3">
    <h5>Old Testament</h5>
    <ul class="list-unstyled">
      <li>Genesis</li>
      <li>Exodus</li>
      <li>Deuteronomy</li>
      <li>Judges</li>
      <li>Ruth</li>
      <li>1 Samuel</li>
      <li>2 Samuel</li>
      <li>1 Chronicles</li>
      <li>2 Chronicles</li>
      <li>Ezra</li>
      <li>Nehemiah</li>
      <li>Job</li>
      <li>Psalms</li>
      <li>Proverbs</li>
      <li>Isaiah</li>
    </ul>
  </div>
  <div class="col-md-3">
    <h5>&nbsp;</h5>
    <ul class="list-unstyled">
      <li>Jeremiah</li>
      <li>Lamentations</li>
      <li>Daniel</li>
      <li>Hosea</li>
      <li>Joel</li>
      <li>Amos</li>
      <li>Obadiah</li>
      <li>Jonah</li>
      <li>Micah</li>
      <li>Habakkuk</li>
      <li>Zephaniah</li>
      <li>Haggai</li>
      <li>Zechariah</li>
      <li>Malachi</li>
    </ul>
  </div>
  <div class="col-md-3">
    <h5>New Testament</h5>
    <ul class="list-unstyled">
      <li>Matthew</li>
      <li>Mark</li>
      <li>Luke</li>
      <li>John</li>
      <li>Acts</li>
      <li>Romans</li>
      <li>1 Corinthians</li>
      <li>2 Corinthians</li>
      <li>Galatians</li>
      <li>Ephesians</li>
      <li>Philippians</li>
      <li>Colossians</li>
      <li>1 Thessalonians</li>
    </ul>
  </div>
  <div class="col-md-3">
  <h5>&nbsp;</h5>
    <ul class="list-unstyled">
      <li>2 Thessalonians</li>
      <li>1 Timothy</li>
      <li>2 Timothy</li>
      <li>Titus</li>
      <li>Hebrews</li>
      <li>James</li>
      <li>1 Peter</li>
      <li>2 Peter</li>
      <li>1 John</li>
      <li>2 John</li>
      <li>Jude</li>
      <li>Revelation</li>
    </ul>
  </div>
</div>
@endsection

@section('sidebar')
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Search</h3>
  </div>
  <div class="panel-body">
    <p>Featured </p>
    <p>By Scripture</p>
    <p>By Topic</p>
    <p>By Series</p>
    <p>By Date</p>
    <p>Video Feed</p>
    <p>Audio Feed</p>
  </div>
</div>
@endsection