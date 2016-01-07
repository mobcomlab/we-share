<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		$this->call('SourceTableSeeder');
		$this->call('LocationTableSeeder');
		$this->call('UserTableSeeder');
		$this->call('TagTableSeeder');
	}

}
