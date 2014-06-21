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

		// $this->call('UserTableSeeder');
		$this->call('CompromissosTableSeeder');
		$this->call('ContatosTableSeeder');
		$this->call('UsersTableSeeder');
	}

}
