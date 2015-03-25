{!! '<?xml version = "1.0" encoding = "utf-8"?>' !!}

<rss xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd" version="2.0">
	<channel>
		<title>Compass HB Sermons</title>
		<itunes:subtitle>The gospel rings out...</itunes:subtitle>
		<itunes:summary>Reaching, teaching, and training people for Christ</itunes:summary>
		<description>Reaching, teaching, and training people for Christ</description>
		<language>en-us</language>
		<copyright>&#x2117; &amp; &#xA9; 2015 Compass HB</copyright>
		<link>http://www.compasshb.com/feed/sermons</link>
		<pubDate>{{ Carbon\Carbon::now()->toRfc2822String() }}</pubDate>
		<itunes:image href="http://www.compasshb.com/images/SermonVideo-v2r0.jpg" />
		<itunes:category text="Religion &amp; Spirituality">
			<itunes:category text="Christianity"/>
		</itunes:category>
		<itunes:category text="Education"/>

		@foreach ($sermons as $sermon)
			<item>
				<title>{{ $sermon->title }}</title>
				<link>{{ route('sermons.show', $sermon->slug) }}</link>
				<itunes:author>{{ $sermon->byline }}</itunes:author>
				<itunes:subtitle>{{ $sermon->byline }} {{ $sermon->text }}</itunes:subtitle>
				<enclosure url="http://example.com/podcasts/everything/AllAboutEverythingEpisode3.m4a" length="8727310" type="audio/x-m4a" />
				<description>{{ $sermon->byline }} {{ $sermon->text }}</description>
				<pubDate>{{ $sermon->published_at->toRfc2822String() }}</pubDate>
				<guid>{{ route('sermons.show', $sermon->slug) }}</guid>
			</item>
		@endforeach
	</channel>
</rss>
