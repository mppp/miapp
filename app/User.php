<?php namespace miApp;

use Illuminate\Database\Eloquent\Model;
use Cartalyst\Sentinel\Users\EloquentUser;

class User extends EloquentUser {
	public static function getUsers($valor){		
		return \DB::table('users')
		->join('role_users', 'users.id', '=', 'role_users.user_id')
		->join('roles', 'roles.id', '=', 'role_users.role_id')
		->select('users.*','users.permissions as userpermissions', 'roles.*')
		->where('first_name', 'like', "%$valor%")
		->orWhere('last_name', 'like', "%$valor%")
		->orWhere('username', 'like', "%$valor%");
	}
	
	public function scopeSearch($query,$valor){
		//dd($valor);
		$query->select(\DB::raw("(username like '%$valor%' or first_name like '%$valor%' or 'last_name like '%$valor%')"));
		
	}

}
