<?php print '<?xml version="1.0" encoding="UTF-8" ?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

{{--Static Pages--}}
<url>
    <loc>{{ Request::root() }}</loc>
    <priority>1.0</priority>
    <changefreq>daily</changefreq>
</url>
<url>
    <loc>{{ Request::root() . '/read' }}</loc>
    <priority>1.0</priority>
    <changefreq>daily</changefreq>
</url>
<url>
    <loc>{{ Request::root() . '/fellowships' }}</loc>
    <priority>1.0</priority>
    <changefreq>daily</changefreq>
</url>
<url>
    <loc>{{ Request::root() . '/sermons' }}</loc>
    <priority>1.0</priority>
    <changefreq>daily</changefreq>
</url>
<url>
    <loc>{{ Request::root() . '/blog' }}</loc>
    <priority>1.0</priority>
    <changefreq>daily</changefreq>
</url>
<url>
    <loc>{{ Request::root() . '/pray' }}</loc>
    <priority>1.0</priority>
    <changefreq>daily</changefreq>
</url>
<url>
    <loc>{{ Request::root() . '/songs' }}</loc>
    <priority>1.0</priority>
    <changefreq>daily</changefreq>
</url>
<url>
    <loc>{{ Request::root() . '/who-we-are' }}</loc>
    <priority>1.0</priority>
    <changefreq>weekly</changefreq>
</url>
<url>
    <loc>{{ Request::root() . '/kids' }}</loc>
    <priority>1.0</priority>
    <changefreq>weekly</changefreq>
</url>
<url>
    <loc>{{ Request::root() . '/youth' }}</loc>
    <priority>1.0</priority>
    <changefreq>weekly</changefreq>
</url>
<url>
    <loc>{{ Request::root() . '/eight-distinctives' }}</loc>
    <priority>1.0</priority>
    <changefreq>weekly</changefreq>
</url>
<url>
    <loc>{{ Request::root() . '/what-we-believe' }}</loc>
    <priority>1.0</priority>
    <changefreq>weekly</changefreq>
</url>
<url>
    <loc>{{ Request::root() . '/ice-cream-evangelism' }}</loc>
    <priority>1.0</priority>
    <changefreq>weekly</changefreq>
</url>
<url>
    <loc>{{ Request::root() . '/photos' }}</loc>
    <priority>1.0</priority>
    <changefreq>weekly</changefreq>
</url>
<url>
    <loc>{{ Request::root() . '/give' }}</loc>
    <priority>1.0</priority>
    <changefreq>weekly</changefreq>
</url>

{{--Dynamic Pages--}}
@foreach($sermons as $slug)
<url>
    <loc>{{ Request::root() . '/' . $slug }}</loc>
    <priority>0.9</priority>
    <changefreq>weekly</changefreq>
</url>
@endforeach

@foreach($blogs as $slug)
<url>
    <loc>{{ Request::root() . '/' . $slug }}</loc>
    <priority>0.9</priority>
    <changefreq>weekly</changefreq>
</url>
@endforeach

@foreach($passages as $slug)
<url>
    <loc>{{ Request::root() . '/' . $slug }}</loc>
    <priority>0.9</priority>
    <changefreq>weekly</changefreq>
</url>
@endforeach

@foreach($series as $slug)
<url>
    <loc>{{ Request::root() . '/' . $slug }}</loc>
    <priority>0.9</priority>
    <changefreq>weekly</changefreq>
</url>
@endforeach

@foreach($songs as $slug)
<url>
    <loc>{{ Request::root() . '/' . $slug }}</loc>
    <priority>0.9</priority>
    <changefreq>weekly</changefreq>
</url>
@endforeach

</urlset>
