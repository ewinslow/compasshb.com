<div class="form-group">
	{!! Form::label('title', 'Title:') !!}
	{!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('worksheet', 'Worksheet URL:') !!}
	{!! Form::text('worksheet', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('body', 'Body:') !!}
	{!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('teacher', 'Preacher:') !!}
	{!! Form::text('teacher', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('text', 'Text:') !!}
	{!! Form::text('text', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('video', 'Video:') !!}
	{!! Form::text('video', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('series', 'Series:') !!}
	{!! Form::text('series', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('sku', 'SKU:') !!}
	{!! Form::text('sku', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('published_at', 'Publish On:') !!}
	{!! Form::input('date', 'published_at', $sermon->published_at->format('Y-m-d'), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
