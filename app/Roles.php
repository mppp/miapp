<?php namespace miApp;

use Illuminate\Database\Eloquent\Model;
use Cartalyst\Sentinel\Roles\EloquentRole;

class Roles extends EloquentRole {

	//protected $table ="roles";
	//protected $fillable = ['slug', 'name', 'permissions'];
	
	public static function getRoles($param){
		return Roles::whereRaw("(slug like '%$param%' or name like '%$param%')");
	}
		
	

}
