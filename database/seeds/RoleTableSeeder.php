<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$roles = ['Super Admin', 'Admin', 'Product Manager', 'Order Manager', 'Shipping Manager', 'User'];
    	
    	foreach ($roles as $role) {
	        DB::table('roles')->insert([ 
	        	'name' => $role
	        ]);
    	}
    }
}
