<?php
use Illuminate\Database\Seeder;
  
class ModulesTableSeeder extends Seeder {
    public function run() {
       \DB::table('modules')->insert(
       	[
       		'name'			=>'master',
       	],
       	[
       		'name'			=>'master',
       	],
       	[
       		'name'			=>'master',
       	]);
    }
}