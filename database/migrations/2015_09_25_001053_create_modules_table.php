<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('modules', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->timestamps();
		});
		
		Schema::create('modules_roles', function (Blueprint $table) {
			$table->increments('id');	
			$table->integer('role_id')->unsigned()->nullable();
			$table->integer('module_id')->unsigned()->nullable();
			$table->foreign('role_id')->references('id')->on('roles');
			$table->foreign('module_id')->references('id')->on('modules');
			$table->timestamps();
		});
		
		
		
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('modules');
		Schema::drop('modules_roles');
	}

}
