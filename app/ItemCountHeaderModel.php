<?php

namespace miApp;

use Illuminate\Database\Eloquent\Model;

class ItemCountHeaderModel extends Model {
	
	// protected $connection = "pgsql2";
	protected $table = 'ItemCountHeader';
	public function getData($storeId, $businessDate) {
		return \DB::table ( 'ISD' . "." . 'ItemCountHeader' )->join ( 'ISD' . "." . 'ItemCountDetail', 'ISD' . "." . 'ItemCountHeader' . "." . 'id', '=', 'ISD' . "." . 'ItemCountDetail' . "." . 'id_ich' )->where ( 'ISD' . "." . 'ItemCountHeader' . "." . 'storeId', '=', $storeId )->where ( 'ISD' . "." . 'ItemCountHeader' . "." . 'businessDate', '=', $businessDate )->get ();
	}
}
