<?php namespace miApp\Http\Middleware;

use Closure;

class SessionMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if((\Sentinel::guest())) {
			if ($request->ajax ()) {
				return response ( 'Unauthorized.', 401 );
			} else {
				return redirect('admin/login');
			}
				
		}
		return $next($request);
	}

}
