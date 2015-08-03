<form action="{{route('search')}}" method="GET" class="form">
	<div class="form-group">
		<input placeholder="Search CompassHB.com"
		       aria-label="Search CompassHB.com"
		       value="{{$query or ''}}"
		       type="search" name="q" class="form-control"
		       {{isset($autofocus) ? 'autofocus' : ''}}>
	</div>
</form>
