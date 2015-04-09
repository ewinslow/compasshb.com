@extends('layouts.dashboard.master')

@section('content')

@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

  @include('layouts.admin.header')

<p>Use the links on the right to navigate.</p>

@endsection

@section('sidebar')

  @include('layouts.admin.sidebar')

@endsection
