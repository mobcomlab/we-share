<?php

class ImageTableSeeder extends Seeder {

    public function run()
    {
        DB::table('image')->delete();

    }

}