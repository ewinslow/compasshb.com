@extends('layouts.master')

@section('side')
  @include('layouts.side.admin')
@endsection

@section('content')

@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<h1 class="tk-seravek-web">Admin</h1>
<p>Admin page for posting and scheduling site content.</p><br/>

@endsection