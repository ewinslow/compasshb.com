<?php namespace CompassHB\Www;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
        protected $fillable = [
        'title',
        'url',
        'image',
        'published_at',
        'expired_at',
    ];

    protected $dates = ['published_at', 'expired_at'];

    /**
     * A slide is owned by a user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('CompassHB\Www\Slide');
    }

    public function setPublishedAtAttribute($date)
    {
        $this->attributes['published_at'] = \Carbon\Carbon::parse($date);
    }

    public function setExpiredAtAttribute($date)
    {
        $this->attributes['expired_at'] = \Carbon\Carbon::parse($date);
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

    /**
     * Get the expired_at attribute.
     *
     * @param $date
     *
     * @return string
     */
    public function getExpiredAtAttribute($date)
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
}
