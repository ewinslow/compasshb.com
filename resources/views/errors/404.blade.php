@extends('layouts.master')

@section('content')
    <div class="row text-center" style="padding: 100px">
    	<h1 class="tk-seravek-web">404 Page Not Found</h1>
		<p><a href="javascript:history.back()">Return to Previous Page</a></p>

		@include('dashboard.search.form')

	</div>
@endsection
