[
@foreach ($sermons as $index => $sermon)
	{
		"title": "{!! $sermon->title !!}",
	  	"date": "{{ Carbon\Carbon::parse($sermon->published_at)->format('F n, Y') }}",
	  	"byline": "{{ $sermon->teacher }}",
	  	"text": "{{ $sermon->text }}",
	  	"url": "{{ $sermon->video }}",
	  	"cover": "{{ $sermon->othumbnail }}",
	  	"slug": "{{ $sermon->slug }}"
	}
	@unless ($index+1 == count($sermons))
	,
	@endunless
@endforeach
]
