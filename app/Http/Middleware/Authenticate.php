<?php

namespace miApp\Http\Middleware;

use Closure;
//use Illuminate\Contracts\Auth\Guard;

use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Illuminate\Database\Capsule\Manager as Capsule;

class Authenticate {
	
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
		//dd(Sentinel::guest());
		//Sentinel::logout();
		//dd(Sentinel::guest());
		if ((Sentinel::guest())) {
			if ($request->ajax ()) {
				return response ( 'Unauthorized.', 401 );
			} else {
				return redirect()->guest('auth/login');
			}
		}
			
		return $next ( $request );
	}
}
