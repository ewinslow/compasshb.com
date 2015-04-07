<?php namespace CompassHB\Www;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
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
}
