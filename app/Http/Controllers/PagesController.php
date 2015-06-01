<?php namespace CompassHB\Www\Http\Controllers;

use Log;
use Cache;
use SearchIndex;
use CompassHB\Www\Blog;
use CompassHB\Www\Song;
use CompassHB\Www\Series;
use CompassHB\Www\Sermon;
use CompassHB\Www\Passage;
use CompassHB\Www\Repositories\Video\VideoRepository;
use CompassHB\Www\Repositories\Photo\PhotoRepository;
use CompassHB\Www\Repositories\Event\EventRepository;

class PagesController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Controller for the homepage.
     *
     * @return view
     */
    public function home(PhotoRepository $photos, VideoRepository $videoClient, EventRepository $event)
    {
        $featuredevents = $event->search('#featuredevent');
        $featuredevents = $featuredevents->events;

        $sermons = Sermon::where('ministry', '=', null)->latest('published_at')->published()->take(3)->get();
        $prevsermon = $sermons->first();
        $nextsermon = Sermon::unpublished()->get();

        $blogs = Blog::latest('published_at')->published()->take(2)->get();
        $videos = Blog::whereNotNull('video')->latest('published_at')->published()->take(2)->get();
        $passage = Passage::latest('published_at')->published()->take(1)->get()->first();

        $distinctives = [
            ['text' => '1. The Bible is Central', 'icon' => 'glyphicon-book'],
            ['text' => '2. We showcase expository preaching', 'icon' => 'glyphicon-cog'],
            ['text' => '3. We seek to maintain a high view of God', 'icon' => 'glyphicon-picture'],
            ['text' => '4. We work to proclaim a biblical gospel', 'icon' => 'glyphicon-bullhorn'],
            ['text' => '5. We have a genuine reliance on prayer', 'icon' => 'glyphicon-cloud-upload'],
            ['text' => '6. We have highly committed participants', 'icon' => 'glyphicon-user'],
            ['text' => '7. We will look to authentic & sacrificial leaders', 'icon' => 'glyphicon-ok'],
            ['text' => '8. We will always be working to plant new churches', 'icon' => 'glyphicon-globe'],
        ];
        shuffle($distinctives);

        foreach ($sermons as $sermon) {
            $videoClient->setUrl($sermon->video);
            $sermon->othumbnail = $videoClient->getThumbnail();
        }

        foreach ($videos as $video) {
            $videoClient->setUrl($video->video);
            $video->othumbnail = $videoClient->getThumbnail();
        }

        $videoClient->setUrl($prevsermon->video);
        $prevsermon->othumbnail = $videoClient->getThumbnail();

        /*
         * Instagram
         * @todo Move caching out of controller
         */
        $url = 'https://api.instagram.com/v1/users/1363574956/media/recent/?count=4&client_id='.env('INSTAGRAM_CLIENT_ID');
        try {
            $instagrams = Cache::remember('instagrams', '180', function () use ($url) {
                return json_decode(file_get_contents($url), true);
            });
        } catch (\Exception $e) {
            Log::warning('Connection refused to api.instagram.com');
            $instagrams['data'] = [];
        }

        /*
         * Smugmug
         */
        $results = $photos->getPhotos(8);

        return view('pages.index', compact(
            'sermons',
            'featuredevents',
            'nextsermon',
            'prevsermon',
            'blogs',
            'videos',
            'passage',
            'distinctives'
        ))->with('images', $results)
            ->with('instagrams', $instagrams['data'])
            ->with('title', 'Compass HB - Huntington Beach');
    }

    /**
     * Populate the Photos page from Photo Client.
     *
     * @return \Illuminate\View\View
     */
    public function photos(PhotoRepository $photos)
    {
        $results = $photos->getRecentPhotos();

        return view('pages.photos')
            ->with('title', 'Photography')
            ->with('photos', $results);
    }

    public function pray()
    {
        return view('dashboard.pray.index')
            ->with('title', 'Pray');
    }

    public function whoweare()
    {
        return view('pages.whoweare')
            ->with('title', 'Who We Are');
    }

    public function eightdistinctives()
    {
        return view('pages.eightdistinctives')
            ->with('title', '8 Distinctives');
    }

    public function give()
    {
        return view('pages.give')
            ->with('title', 'Give');
    }

    public function icecreamevangelism()
    {
        return view('pages.icecreamevangelism')
            ->with('title', 'Ice Cream Evangelism');
    }

    public function whatwebelieve()
    {
        return view('pages.whatwebelieve')
            ->with('title', 'What We Believe');
    }

    public function bunnyrun()
    {
        return view('pages.landing.bunnyrun')
            ->with('title', 'The Bunny Run 5K');
    }

    public function manifest()
    {
        return view('feeds.manifest');
    }

    public function search($q)
    {
        $query =
        [
            'body' => [
                    'from' => 0,
                    'size' => 500,
                    'query' => [
                            'fuzzy_like_this' => [
                                    '_all' => [
                                            'like_text' => $q,
                                            'fuzziness' => 0.3,
                                        ],
                                ],

                        ],
                ],
        ];
        dd(SearchIndex::getResults($query));
    }

    public function sitemap(EventRepository $event)
    {
        $blogs = Blog::lists('slug');
        $sermons = Sermon::published()->lists('slug', 'video');
        $passages = Passage::lists('slug');
        $series = Series::lists('slug');
        $songs = Song::lists('slug');

        $events = $event->events();
        $events = $events->events;

        return response()
            ->view('pages.sitemap', compact('sermons', 'blogs', 'passages', 'series', 'songs', 'events'))
            ->header('Content-Type', 'application/xml');
    }

    public function events(EventRepository $event, $id = null)
    {
        if ($id) {
            $event = $event->event($id);

            return view('dashboard.events.show', compact('event'));
        } else {
            $events = $event->events();

            $events = array_filter($events->events, function ($var) {
                // Filter out Home Fellowship Group events
                return ($var->organizer->id != '8215662871');
            });

            return view('dashboard.events.index', compact('events'));
        }
    }

    /**
     * Clear the event cache when event management system sends a webhook callback.
     */
    public function cleareventcache($auth, EventRepository $event)
    {
        if ($auth == env('EVENTBRITE_CALLBACK')) {
            Cache::forget('searchevent');
            Cache::forget('events');

            // Warm the cache
            $event->events();
            $event->search('#featuredevents');
        }

        return "Success";
    }
}
