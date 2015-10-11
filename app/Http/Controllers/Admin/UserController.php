<?php namespace miApp\Http\Controllers\Admin;

use miApp\Http\Requests;
use miApp\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Contracts\Validation\Validator;

use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use miApp\User;
use miApp\Roles;
use Cartalyst\Sentinel\Native\Facades\Cartalyst\Sentinel\Native\Facades;
use miApp\miApp;


class UserController extends Controller {

	use AuthenticatesAndRegistersUsers;
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$search = $request->get('search');
		//$users = User::whereRaw("first_name like '%$search%' or last_name like '%$search%' or username like '%$search%'")->paginate(15);
		$users = User::getUsers($search)->paginate(15);
		//dd($users);
		return view('admin.users.index',compact('users',$users));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$roles = Roles::all(['id','name'])->lists('name','id');
		//dd($roles);
		return view('admin.users.create',compact('roles',$roles));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
