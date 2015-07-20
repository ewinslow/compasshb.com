@extends('layouts.dashboard.master')

@section('content')

@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

  @include('layouts.admin.header')

  @include('layouts.admin.sidebar')

@endsection