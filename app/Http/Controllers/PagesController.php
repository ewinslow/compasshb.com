<?php namespace CompassHB\Www\Http\Controllers;

use CompassHB\Www\Blog;
use CompassHB\Www\Sermon;
use CompassHB\Www\Passage;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    // stub for downloading podcasts
    public function podcast($year, $date, $slug, $video_id)
    {
        $post = $this->posts->getSingle($year, $date, $slug);

        $video_url = $post[0]->meta->video_oembed;

        $video_id = substr($video_url, strrpos($video_url, '/') + 1);

        $vimeo = new \Vimeo\Vimeo(
            env('VIMEO_CLIENT_ID'),
            env('VIMEO_CLIENT_SECRET'),
            env('VIMEO_TOKEN')
        );

        $video = $vimeo->request("/videos/$video_id");
        $video = $video['body'];
        $video = $video['download'];
        $video = $video[1];
        $video = $video['link'];

        return redirect($video);
    }

    /**
     * Homepage.
     */
    public function home()
    {
        $sermons = Sermon::latest('published_at')->published()->take(4)->get();
        $prevsermon = $sermons->first();
        $nextsermon = Sermon::unpublished()->get();

        $blogs = Blog::latest('published_at')->published()->take(2)->get();
        $videos = Blog::whereNotNull('video')->latest('published_at')->published()->take(2)->get();
        $passage = Passage::latest('published_at')->published()->take(1)->get()->first();

        $client = new \GuzzleHttp\Client();

        foreach ($sermons as $sermon) {
            $sermon->othumbnail = get_othumb($sermon->video);
        }

        foreach ($videos as $video) {
            $video->othumbnail = get_othumb($video->video);
        }

        // Instagram
        $url = 'https://api.instagram.com/v1/users/1363574956/media/recent/?count=4&client_id='.env('INSTAGRAM_CLIENT_ID');
        $instagrams = file_get_contents($url);
        $instagrams = json_decode($instagrams, true);

        // Smugmug
        $feedUrl = 'http://photos.compasshb.com/hack/feed.mg?Type=nicknameRecentPhotos&Data=compasshb&format=rss200&Size=Medium';
        $num = 4;

        $rawFeed = file_get_contents($feedUrl);
        $xml = new \SimpleXmlElement($rawFeed);
        $results = array();

        for ($i = 0; $i < $num; $i++) {
            // Parse Image Link
            $link = $xml->channel->item->link;
            $link = substr($link->asXML(), 6, -7);

            // Parse Image Source
            $namespaces = $xml->channel->item[$i]->getNameSpaces(true);
            $media = $xml->channel->item[$i]->children($namespaces['media']);
            $image = $media->group->content[3]->attributes();
            $image = $image['url']->asXML();
            $image = substr($image, 6, -1);

            $results[] = array($link, $image);
        }

        return view('app', compact(
            'sermons',
            'nextsermon',
            'prevsermon',
            'blogs',
            'videos',
            'passage'
        ))->with('images', $results)
          ->with('instagrams', $instagrams['data'])
          ->with('title', 'Compass HB - Huntington Beach');
    }

    /**
     * Populate the Photos page from Smugmug.
     *
     * @return type
     */
    public function photos()
    {
        // Smugmug
        $feedUrl = 'http://photos.compasshb.com/hack/feed.mg?Type=nicknameRecentPhotos&Data=compasshb&format=rss200&Size=Medium';
        $num = 40;

        $rawFeed = file_get_contents($feedUrl);
        $xml = new \SimpleXmlElement($rawFeed);
        $results = array();

        for ($i = 0; $i < $num; $i++) {
            // Parse Image Link
          $link = $xml->channel->item->link;
            $link = substr($link->asXML(), 6, -7);

          // Parse Image Source
          $namespaces = $xml->channel->item[$i]->getNameSpaces(true);
            $media = $xml->channel->item[$i]->children($namespaces['media']);
            $image = $media->group->content[3]->attributes();
            $image = $image['url']->asXML();
            $image = substr($image, 6, -1);

            $results[] = array($link, $image);
        }

        return view('pages.photos')
            ->with('title', 'Photography')
            ->with('photos', $results);
    }

    public function pray()
    {
        return view('pages.pray')
            ->with('title', 'Pray');
    }

    public function whoweare()
    {
        return view('pages.whoweare')->with('title', 'Who We Are');
    }

    public function eightdistinctives()
    {
        return view('pages.eightdistinctives')->with('title', '8 Distinctives');
    }

    public function give()
    {
        return view('pages.give')->with('title', 'Give');
    }

    public function icecreamevangelism()
    {
        return view('pages.icecreamevangelism')->with('title', 'Ice Cream Evangelism');
    }

    public function kids()
    {
        return view('pages.kids')->with('title', 'Kids Ministry');
    }

    public function whatwebelieve()
    {
        return view('pages.whatwebelieve')->with('title', 'What We Believe');
    }

    public function youth()
    {
        return view('pages.youth')->with('title', 'The United');
    }

    public function college()
    {
        return view('pages.college')->with('title', 'The Underground');
    }

    public function sundayschool()
    {
        return view('pages.sundayschool')->with('title', 'Sunday School');
    }

    public function bunnyrun()
    {
        return view('pages.landing.bunnyrun')->with('title', 'The Bunny Run 5K');
    }

    public function videos()
    {
        return view('archives.videos')
            ->with('title', 'Videos');
    }

    public function calendar()
    {
        return view('pages.calendar')->with('title', 'Calendar');
    }
}
