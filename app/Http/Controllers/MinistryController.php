<?php

namespace CompassHB\Www\Http\Controllers;

use CompassHB\Www\Series;
use CompassHB\Www\Sermon;

class MinistryController extends Controller
{
    /**
     * Controller for Kids Ministry page.
     *
     * @return \Illuminate\View\View
     */
    public function kids()
    {
        return view('ministries.kids.index')
            ->with('title', 'Kids Ministry');
    }

    /**
     * Controller for Youth Ministry page.
     *
     * @return \Illuminate\View\View
     */
    public function youth()
    {
        return view('ministries.youth.index')
            ->with('title', 'The United');
    }

    /**
     * Controller for Sunday School ministry page.
     *
     * @return \Illuminate\View\View
     */
    public function sundayschool()
    {
        $series = Series::where('ministry', '=', 'sundayschool')->get()->reverse();
        $sermons = Sermon::where('ministry', '=', 'sundayschool')->where('series_id', '=', $series->first()->id)->latest('published_at')->published()->get();

        return view('ministries.sundayschool.index',
            compact('sermons', 'series'))
            ->with('title', 'Sunday School');
    }

    /**
     * Controller for College Ministry page.
     *
     * @return \Illuminate\View\View
     */
    public function college()
    {
        return view('ministries.college.index')
            ->with('title', 'The Underground');
    }
}
