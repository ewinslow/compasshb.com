<?php namespace CompassHB\Www;

use Illuminate\Database\Eloquent\Model;

class Passage extends Model {

	protected $fillable = [
		'title',
		'body',
		'published_at'
	];

	protected $dates = ['published_at'];

	/**
	 * A passage is owned by a user
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user()
	{
		return $this->belongsTo('CompassHB\Www\Passage');
	}

		public function setPublishedAtAttribute($date)
	{
		$this->attributes['published_at'] = \Carbon\Carbon::parse($date);
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
