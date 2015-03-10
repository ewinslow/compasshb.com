<rss version="2.0" xmlns:jwplayer="http://rss.jwpcdn.com/">
<channel>

	@foreach ($songs as $song)
		<item>
			<title>{{ $song->title }}</title>
			<description>{{ $song->excerpt }}</description>
			<jwplayer:source file="{{ $song->audio }}"></jwplayer:source>
		</item>
	@endforeach

</channel>
</rss>

