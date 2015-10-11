<?php

namespace miApp\Http\Middleware;

use Closure;
//use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\RedirectResponse;

use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Illuminate\Database\Capsule\Manager as Capsule;

class RedirectIfAuthenticated {
	
	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	//protected $auth;
	
	/**
	 * Create a new filter instance.
	 *
	 * @param Guard $auth        	
	 * @return void
	 */
	/*public function __construct(Guard $auth) {
		$this->auth = $auth;
	}*/
	
	/**
	 * Handle an incoming request.
	 *
	 * @param \Illuminate\Http\Request $request        	
	 * @param \Closure $next        	
	 * @return mixed
	 */
	public function handle($request, Closure $next) {
		//dd(Sentinel::check());
		if ($user = Sentinel::check()) {
			return new RedirectResponse ( url ( '/home' ) );
		}
		return $next ( $request );
	}
}
