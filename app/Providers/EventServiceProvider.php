<?php namespace CompassHB\Www\Providers;

use CompassHB\Www\Blog;
use CompassHB\Www\Song;
use CompassHB\Www\Sermon;
use CompassHB\Www\Series;
use CompassHB\Www\Passage;
use CompassHB\Www\Fellowship;
use CompassHB\Www\Events\LogUserLastLogin;
use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event handler mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'auth.login' => [
            LogUserLastLogin::class,
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param \Illuminate\Contracts\Events\Dispatcher $events
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        /*
         * Generate slug on models with that column when saved
         * or updated.
         */
        Fellowship::creating(function ($object) {
            $object->slug = makeSlugFromTitle(new Fellowship(), $object->title);
        });

        Blog::creating(function ($object) {
            $object->slug = makeSlugFromTitle(new Blog(), $object->title);
        });

        Passage::creating(function ($object) {
            $object->slug = makeSlugFromTitle(new Passage(), $object->title);
        });

        Sermon::creating(function ($object) {
            $object->slug = makeSlugFromTitle(new Sermon(), $object->title);
        });

        Series::creating(function ($object) {
            $object->slug = makeSlugFromTitle(new Series(), $object->title);
        });

        Song::creating(function ($object) {
            $object->slug = makeSlugFromTitle(new Song(), $object->title);
        });
    }
}
