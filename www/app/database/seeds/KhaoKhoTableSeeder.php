<?php

class KhaoKhoTableSeeder extends Seeder {

    public function run()
    {
        DB::table('khaokho')->delete();
    }

}