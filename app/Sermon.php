<?php namespace CompassHB\Www;

use Spatie\SearchIndex\Searchable;
use Illuminate\Database\Eloquent\Model;

class Sermon extends Model implements Searchable
{
    protected $fillable = [
        'title',
        'body',
        'worksheet',
        'file',
        'teacher',
        'text',
        'video',
        'series',
        'sku',
        'published_at',
    ];

    protected $dates = ['published_at'];

    /**
     * Set the empty field to be null using
     * a Laravel mutator function.
     */
    public function setVideoAttribute($value)
    {
        $this->attributes['video'] = (!$value) ? null : $value;
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
