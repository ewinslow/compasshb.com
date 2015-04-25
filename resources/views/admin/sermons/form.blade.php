<div class="form-group">
	{!! Form::label('title', 'Title:') !!}
	{!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('worksheet', 'Worksheet:') !!}
	{!! Form::file('worksheet', ['class' => 'form-control']) !!}
	<p><a href="{{ $sermon->worksheet }}">{{ $sermon->worksheet }}</a></p>
</div>

<div class="form-group">
	{!! Form::label('body', 'Body:') !!}
	{!! Form::textarea('body', null, ['class' => 'form-control compasshb-editor']) !!}
</div>

<div class="form-group">
	{!! Form::label('teacher', 'Teacher:') !!}
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
