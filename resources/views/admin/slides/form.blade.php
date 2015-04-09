<div class="form-group">
	{!! Form::label('title', 'Title:') !!}
	{!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('url', 'Link URL:') !!}
	{!! Form::text('url', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('image', 'Image URL:') !!}
	{!! Form::text('image', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('published_at', 'Publish On:') !!}
	{!! Form::input('date', 'published_at', $slide->published_at->format('Y-m-d'), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('expired_at', 'Expire On:') !!}
	{!! Form::input('date', 'expired_at', $slide->expired_at->format('Y-m-d'), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
