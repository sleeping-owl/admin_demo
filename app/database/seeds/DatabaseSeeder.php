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

		Contact::deleteAll();

		$this->call('CountriesTableSeeder');
		$this->call('CompaniesTableSeeder');
		$this->call('ContactsTableSeeder');
		$this->call('ContactCompanyTableSeeder');
	}

}
