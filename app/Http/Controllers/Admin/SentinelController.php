<?php namespace miApp\Http\Controllers\Admin;

use miApp\Http\Requests;
use miApp\Http\Controllers\Controller;


use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;

use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Illuminate\Database\Capsule\Manager as Capsule;

//require 'vendor\autoload.php';

class SentinelController extends Controller {

	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function __construct(Guard $auth, Registrar $registrar) {
		$this->auth = $auth;
		$this->registrar = $registrar;
		
		$this->middleware ( 'guest', [ 
				'except' => 'getLogout' 
		] );
	}
	
/**
	 * The Guard implementation.
	 *
	 * @var \Illuminate\Contracts\Auth\Guard
	 */
	protected $auth;
	
	/**
	 * The registrar implementation.
	 *
	 * @var \Illuminate\Contracts\Auth\Registrar
	 */
	protected $registrar;
	
	/**
	 * Show the application registration form.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getRegister() {
		return view ( 'auth.register' );
	}
	
	/**
	 * Handle a registration request for the application.
	 *
	 * @param \Illuminate\Http\Request $request        	
	 * @return \Illuminate\Http\Response
	 */
	public function postRegister(Request $request) {
		//$validator = $this->registrar->validator ( $request->all () );
		//dd($request->all());
		
		$data = $request->all();
		$rules = array(
				'first_name' 				=> 'required',
				'last_name'  				=> 'required',
				'email' 	  				=> 'required|email|unique:users,email',
				'password'   				=> 'required|min:6',
				'password_confirmation'   	=> 'required|min:6|same:password'	
		);
		
		$validator = \Validator::make($data,$rules);
		
		if ($validator->fails ()) {
			$this->throwValidationException ( $request, $validator );
		}
		//Sentinel::register($data);
		if(Sentinel::register($data))
			return redirect ( $this->loginPath () );

			
		//return redirect ( $this->redirectPath () );
		
		/*return redirect ( $this->loginPath () )->withInput ( $request->only ( 'email', 'remember' ) )->withErrors ( [
				'email' => $this->getFailedLoginMessage ()
		] );*/
	}
	
	/**
	 * Show the application login form.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getLogin() {
		return view ( 'auth.login' );
	}
	
	/**
	 * Handle a login request to the application.
	 *
	 * @param \Illuminate\Http\Request $request        	
	 * @return \Illuminate\Http\Response
	 */
	public function postLogin(Request $request) {
		//dd($request->all());
		//HNjOSGWoVHCNx70UAnbphnAJVIttFvot
		
		$this->validate ( $request, [ 
				'email' => 'required|email',
				'password' => 'required' 
		] );
		$credentials = $request->only ( 'email', 'password' );
		$user = Sentinel::findByCredentials($credentials);

		if(Sentinel::validateCredentials($user, $credentials)){
			if(\Activation::completed($user)){
				
				$user = Sentinel::authenticate($credentials);
				
				
				
			}else{
				return redirect ( $this->loginPath () )->withInput ( $request->only ( 'email', 'remember' ) )->withErrors ( [
						"Su usuario no se encuentra activo"
				] );
			}

		}else{
			return redirect ( $this->loginPath () )->withInput ( $request->only ( 'email', 'remember' ) )->withErrors ( [
					"Su credencial no es valida"
			] );
		}
		return redirect ( $this->loginPath () )->withInput ( $request->only ( 'email', 'remember' ) )->withErrors ( [ 
				'email' => $this->getFailedLoginMessage () 
		] );	
	}
	
	/**
	 * Get the failed login message.
	 *
	 * @return string
	 */
	protected function getFailedLoginMessage() {
		return 'These credentials do not match our records.';
	}
	
	/**
	 * Log the user out of the application.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getLogout() {
		$this->auth->logout ();
		
		return redirect ( property_exists ( $this, 'redirectAfterLogout' ) ? $this->redirectAfterLogout : '/' );
	}
	
	/**
	 * Get the post register / login redirect path.
	 *
	 * @return string
	 */
	public function redirectPath() {
		if (property_exists ( $this, 'redirectPath' )) {
			return $this->redirectPath;
		}
		
		return property_exists ( $this, 'redirectTo' ) ? $this->redirectTo : '/home';
	}
	
	/**
	 * Get the path to the login route.
	 *
	 * @return string
	 */
	public function loginPath() {
		return property_exists ( $this, 'loginPath' ) ? $this->loginPath : '/auth/login';
	}

}
