<?php namespace CompassHB\Www;

use Spatie\SearchIndex\Searchable;
use Illuminate\Database\Eloquent\Model;

class Series extends Model implements Searchable
{
    protected $fillable = [
        'title',
        'body',
        'image',
    ];

    /**
     * A series is owned by a user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('CompassHB\Www\Series');
    }

    /**
     * A series has many sermons.
     *
     * @return HasMany
     */
    public function sermons()
    {
        return $this->hasMany('CompassHB\Www\Sermon');
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
        return 'series';
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
