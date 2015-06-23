<?php

namespace CompassHB\Www\Http\Controllers;

use CompassHB\Www\Sermon;
use CompassHB\Www\Repositories\Video\VideoRepository;
use CompassHB\Www\Repositories\Event\EventRepository;

class FellowshipsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(VideoRepository $video, EventRepository $event)
    {
        $sermon = Sermon::where('ministry', '=', null)->latest('published_at')->published()->take(1)->get()->first();

        $video->setUrl($sermon->video);
        $sermon->iframe = $video->getEmbedCode();

        $e = $event->events();
        $hfg = [];

        $events = array_filter($e, function ($var) {
                // Filter out Home Fellowship Group events
                return ($var->organizer_id == '8215662871');
            });

        // Remove duplicates
        foreach (array_reverse($events) as $item) {
            if (isset($item->series_id)) {
                $hfg[$item->series_id] = $item;
            }
        }

        $hfg = array_reverse($hfg);

        $map = '';
        foreach ($hfg as $h) {
            //    $map .= '&markers=color:0x497F9B|'.$h->venue->latitude.','.$h->venue->longitude;
        }

        return view('dashboard.fellowships.index', compact('sermon', 'hfg', 'map'))
            ->with('title', 'Home Fellowship Groups');
    }

    public function show(EventRepository $event, $id)
    {
        $event = $event->event($id);

        return view('dashboard.fellowships.show', compact('event'));
    }
}
