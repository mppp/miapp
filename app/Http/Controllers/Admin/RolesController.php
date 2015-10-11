<?php namespace miApp\Http\Controllers\Admin;

use miApp\Http\Requests;
use miApp\Http\Controllers\Controller;

use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Illuminate\Database\Capsule\Manager as Capsule;

use Illuminate\Http\Request;
use miApp\Roles;
use Illuminate\Database\QueryException;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Illuminate\Http;
class RolesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	
	public function index(Request $request)
	{
		//$param = $request->get("search");
		$param = "";
		$roles = Roles::getRoles($param)->paginate(15);
		return view("admin.roles.index",compact('roles',$roles));
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view("admin.roles.create");
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//dd($request->all());
		/**
		 * Obtengo los valores correspondiente al formulario
		 */
		$name = $request->input('name');
		$create = $request->input('user_create');
		$delete = $request->input('user_delete');
		$view = $request->input('user_view');
		$update = $request->input('user_update');
		/**
		 * creo el formato correspondiente para los permiso segun lo seleccionado
		 */
		/*$permissions="{";
		$permissions.= $create!=null?'"'.$create.'":true,':'"user.create":false,';
		$permissions.= $delete!=null?'"'.$delete.'":true,':'"user.delete":false,';
		$permissions.= $view  !=null?'"'.$view.  '":true,':'"user.view":false,';
		$permissions.= $update!=null?'"'.$update.'":true' :'"user.update":false';
		$permissions.="}";*/
		
		$permissions = array(
			'user.create'=>	$create!=null?true:false,
			'user.delete'=>	$delete!=null?true:false,
			'user.view'=>	$view!=null?true:false,
			'user.update'=>	$update!=null?true:false,
		);
		

		try{
			Sentinel::getRoleRepository()->createModel()->create([
			    'name' 			=> $name,
			    'slug' 			=> strtolower($name),
				'permissions'	=>$permissions,
			]);
		}catch (QueryException $e){
		
			flash()->overlay("Ocurrió un error en el registro, consulte con el administrador",'Aviso');
			return redirect()->back()->withInput($request->all());
		}
			flash()->overlay('Tu registro ha sido creado!','Aviso');
			return redirect("admin/roles/create");
		
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
		$roles = Roles::findOrFail($id);
		//dd($roles);
		return view("admin.roles.edit",compact('roles'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,Request $request)
	{
		
		/**
		 * consulto el rol para actualizar
		 */
		$roles = Roles::findOrFail($id);
		
		/**
		 * Obtengo los valores correspondiente al formulario
		 */
		$name = $request->input('name');
		$create = $request->input('user_create');
		$delete = $request->input('user_delete');
		$view = $request->input('user_view');
		$update = $request->input('user_update');
		/**
		 * creo el formato correspondiente para los permiso segun lo seleccionado
		*/
		$permissions="{";
		$permissions.= $create!=null?'"'.$create.'":true,':'"user.create":false,';
		$permissions.= $delete!=null?'"'.$delete.'":true,':'"user.delete":false,';
		$permissions.= $view  !=null?'"'.$view.  '":true,':'"user.view":false,';
		$permissions.= $update!=null?'"'.$update.'":true' :'"user.update":false';
		$permissions.="}";
		
		
		
		
		
		
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
