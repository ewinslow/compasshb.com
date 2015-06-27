<?php

namespace CompassHB\Www\Providers;

use SearchIndex;
use CompassHB\Www\Blog;
use CompassHB\Www\Song;
use CompassHB\Www\Sermon;
use CompassHB\Www\Series;
use CompassHB\Www\Passage;
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
        Blog::saving(function ($object) {

            // Assign slug if one does not exist
            $object->slug = isset($object->slug) === false ? makeSlugFromTitle(new Blog(), $object->title) : $object->slug;

            // Index object in search engine
            if (env('APP_ENV') == 'production') {
                SearchIndex::upsertToIndex($object);
            }
        });

        Passage::saving(function ($object) {

            $object->slug = isset($object->slug) === false ? makeSlugFromTitle(new Passage(), $object->title) : $object->slug;

            if (env('APP_ENV') == 'production') {
                SearchIndex::upsertToIndex($object);
            }
        });

        Sermon::saving(function ($object) {
            $object->slug = isset($object->slug) === false ? makeSlugFromTitle(new Sermon(), $object->title) : $object->slug;

            if (env('APP_ENV') == 'production') {
                SearchIndex::upsertToIndex($object);
            }
        });

        Series::saving(function ($object) {
            $object->slug = isset($object->slug) === false ? makeSlugFromTitle(new Series(), $object->title) : $object->slug;

            if (env('APP_ENV') == 'production') {
                SearchIndex::upsertToIndex($object);
            }
        });

        Song::saving(function ($object) {
            $object->slug = isset($object->slug) === false ? makeSlugFromTitle(new Song(), $object->title) : $object->slug;

            if (env('APP_ENV') == 'production') {
                SearchIndex::upsertToIndex($object);
            }
        });
    }
}
