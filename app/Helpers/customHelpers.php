<?php
if (! function_exists ( 'permissionsToArray' )) {
	function permissionsToArray() {
		$permissions = array(
				'user.create'=>	$create!=null?true:false,
				'user.delete'=>	$delete!=null?true:false,
				'user.view'=>	$view!=null?true:false,
				'user.update'=>	$update!=null?true:false,
		);
		
		return $permissions;
	}
}