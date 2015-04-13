<div class="form-group">
	{!! Form::label('title', 'Title:') !!}
	{!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('excerpt', 'Excerpt:') !!}
	{!! Form::text('excerpt', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('body', 'Body:') !!}
	{!! Form::text('body', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('video', 'Video:') !!}
	{!! Form::text('video', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('audio', 'Audio:') !!}
	{!! Form::text('audio', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('published_at', 'Publish On:') !!}
	{!! Form::input('date', 'published_at', $song->published_at->format('Y-m-d'), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
