<?php namespace CompassHB\Www\Handlers\Events;
use CompassHB\Www\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class LogUserLastLogin {

	/**
	 * Create the event handler.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the event.
	 *
	 * @param  User $user
	 * @return void
	 */
	public function handle(User $user, $remember)
	{
		$user->last_login = \Carbon\Carbon::now();
		$user->save();
	}

}
