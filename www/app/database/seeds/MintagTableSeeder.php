<?php

class MintagTableSeeder extends Seeder {

    public function run()
    {
        DB::table('mintag')->delete();

    }

}