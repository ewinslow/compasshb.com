<br/><br/>

	{!! Form::open(array('route' => 'search', 'class' => 'form')) !!}

	<div class="form-group">
		{!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => isset($term) ? $term : 'Search']) !!}
	</div>

	{!! Form::close() !!}

<br/><br/>