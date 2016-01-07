<?php

class IceTableSeeder extends Seeder {

    public function run()
    {
        DB::table('ice')->delete();
    }

}