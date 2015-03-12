<?php namespace CompassHB\Www;

use Illuminate\Database\Eloquent\Model;

class Fellowship extends Model {

		protected $fillable = [
		'title',
		'description',
		'location',
		'day'
	];

	/**
	 * A fellowship is owned by a user
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user()
	{
		return $this->belongsTo('CompassHB\Www\Fellowship');
	}


}
