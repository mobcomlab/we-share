<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        DB::table('users')->insert(array(
		    array('name' => 'Admin', 'username' => 'admin', 'email' => 'admin@admin.com', 'password' => Hash::make('admin336'))
		));
    }

}