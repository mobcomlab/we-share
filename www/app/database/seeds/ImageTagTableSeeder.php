<?php

class ImageTagTableSeeder extends Seeder {

    public function run()
    {
        DB::table('imagetag')->delete();

    }

}