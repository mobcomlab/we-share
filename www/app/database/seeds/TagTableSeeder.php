<?php

class TagTableSeeder extends Seeder {

    public function run()
    {
        DB::table('tag')->delete();

        DB::table('tag')->insert(array(
		    array('tag_id' => 1, 'tag' => 'khaokho', 'pull_from_ig' => true, 'status' => 'Use'),
		    array('tag_id' => 2, 'tag' => 'phetchabun', 'pull_from_ig' => true, 'status' => 'Use'),
		    array('tag_id' => 3, 'tag' => 'route12', 'pull_from_ig' => true, 'status' => 'Use')
		));
    }

}