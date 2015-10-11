<?php
use Illuminate\Database\Seeder;
  
class AdminTableSeeder extends Seeder {
    public function run() {
       \DB::table('users')->insert([
       		'username'		=>'master',
       		'email'			=>'ernestodavid.gr@gmail.com',
       		'password'		=>'eg123456',
       		'permissions'	=>'{"user.create":true,"user.delete":true,"user.view":true,"user.update":true}',	
       		'last_login'	=>'master',
       		'first_name'	=>'Ernesto',
       		'last_name'		=>'Gonzalez',
       ]);
    }
}