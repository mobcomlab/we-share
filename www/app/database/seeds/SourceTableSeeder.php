<?php

class SourceTableSeeder extends Seeder {

    public function run()
    {
        DB::table('source')->delete();

        DB::table('source')->insert(array(
		    array('source_id' => 1, 'name' => 'Instagram'),
		    array('source_id' => 2, 'name' => 'Facebook')
		));
    }

}