[
@foreach ($sermons as $index => $sermon)
	{
		"title": "{{ $sermon->post_title }}",
	  	"date": "{{ date_format($sermon->post_date, 'F n, Y') }}",
	  	"byline": "{{ $sermon->meta->byline }}",
	  	"text": "{{ $sermon->meta->sermon_text }}",
	  	"url": "{{ $sermon->meta->video_oembed }}",
	  	"cover": "{{ $sermon->meta->othumbnail }}"
	}
	@unless ($index+1 == count($sermons))
	,
	@endunless
@endforeach
]
