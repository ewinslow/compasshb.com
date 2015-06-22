<?php

namespace CompassHB\Www;

use Spatie\SearchIndex\Searchable;
use Illuminate\Database\Eloquent\Model;
use CompassHB\Www\Repositories\Transcoder\ZencoderTranscoderRepository;

class Sermon extends Model implements Searchable
{
    protected $fillable = [
        'title',
        'body',
        'excerpt',
        'worksheet',
        'file',
        'teacher',
        'text',
        'video',
        'ministry',
        'series_id',
        'sku',
        'published_at',
    ];

    protected $dates = ['published_at'];

    /**
     * Set the empty field to be null using
     * a Larvel mutator function.
     *
     * @param $value
     */
    public function setSeriesIdAttribute($value)
    {
        $this->attributes['series_id'] = $value ? $value : null;
    }

    /**
     * Set the empty field to be null using
     * a Larvel mutator function.
     *
     * @param $value
     */
    public function setExcerptAttribute($value)
    {
        $this->attributes['excerpt'] = $value ? $value : null;
    }

    /**
     * Set the empty field to be null using
     * a Larvel mutator function.
     *
     * @param $value
     */
    public function setMinistryAttribute($value)
    {
        $this->attributes['ministry'] = $value ? $value : null;
    }

    /**
     * Set the empty field to be null using
     * a Laravel mutator function.
     */
    public function setVideoAttribute($value)
    {
        if (!$value) {
            $this->attributes['video'] = null;
        } else {
            $this->attributes['video'] = $value;

            // Set the audio attribute
            $transcoder = new ZencoderTranscoderRepository();

            // Only transcode in production when needed
            if (env('APP_ENV') == 'production' &&
                !array_key_exists('ministry', $this->attributes) &&
                !array_key_exists('audio', $this->attributes) &&
                array_key_exists('video', $this->attributes)) {
                $job = $transcoder->saveAudio(route('sermons.show', str_slug($this->attributes['title']).'/download'), str_slug($this->attributes['title']));
                $this->attributes['audio'] = $job->outputs[0]->url;
            } else {
                $this->attributes['audio'] = null;
            }
        }
    }

    /**
     * A sermon is owned by a user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('CompassHB\Www\Sermon');
    }

    /**
     * A sermon belongs to a series.
     *
     * @return BelongsTo
     */
    public function series()
    {
        return $this->belongsTo('CompassHB\Www\Series');
    }

    public function setPublishedAtAttribute($date)
    {
        $this->attributes['published_at'] = \Carbon\Carbon::parse($date);
    }

    /**
     * Get the published_at attribute.
     *
     * @param $date
     *
     * @return string
     */
    public function getPublishedAtAttribute($date)
    {
        return new \Carbon\Carbon($date);
    }

    public function scopeUnpublished($query)
    {
        $query->where('published_at', '>', \Carbon\Carbon::now());
    }

    public function scopePublished($query)
    {
        $query->where('published_at', '<=', \Carbon\Carbon::now());
    }

    /**
     * Returns an array with properties which must be indexed.
     *
     * @return array
     */
    public function getSearchableBody()
    {
        $searchableProperties = [
            'title' => $this->title,
            'body' => $this->body,
            'text' => $this->text,
            'teacher' => $this->teacher,
            'ministry' => $this->ministry,
        ];

        return $searchableProperties;
    }

    /**
     * Return the type of the searchable subject.
     *
     * @return string
     */
    public function getSearchableType()
    {
        return 'sermon';
    }

    /**
     * Return the id of the searchable subject.
     *
     * @return string
     */
    public function getSearchableId()
    {
        return $this->id;
    }
}
