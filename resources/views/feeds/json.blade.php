[
@foreach ($sermons as $index => $sermon)
	{
		"title": "{!! $sermon->title !!}",
	  	"date": "{{ date_format($sermon->published_at, 'F n, Y') }}",
	  	"byline": "{{ $sermon->byline }}",
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
