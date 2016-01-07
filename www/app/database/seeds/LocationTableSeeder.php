<?php

class LocationTableSeeder extends Seeder {

    public function run()
    {
        DB::table('location')->delete();

        DB::table('location')->insert(array(
		    array('location_id' => 1, 'name' => ' ', 'latitude' => ' ','longitude' => ' '),
		));
    }

}