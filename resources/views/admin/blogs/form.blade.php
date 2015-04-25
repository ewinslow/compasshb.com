<div class="form-group">
	{!! Form::label('title', 'Title:') !!}
	{!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('byline', 'Byline:') !!}
	{!! Form::text('byline', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('body', 'Body:') !!}
	{!! Form::textarea('body', null, ['class' => 'form-control compasshb-editor']) !!}
</div>

<div class="form-group">
	{!! Form::label('video', 'Video:') !!}
	{!! Form::text('video', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('thumbnail', 'Thumbnail URL:') !!}
	{!! Form::text('thumbnail', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('published_at', 'Publish On:') !!}
	{!! Form::input('date', 'published_at', $blog->published_at->format('Y-m-d'), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
