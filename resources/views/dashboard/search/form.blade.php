<br/><br/>

	{!! Form::open(array('route' => 'search', 'method' => 'get', 'class' => 'form')) !!}

	<div class="form-group">
		{!! Form::text('q', null, ['class' => 'form-control', 'placeholder' => isset($query) ? $query : 'Search']) !!}
	</div>

	{!! Form::close() !!}

<br/><br/>