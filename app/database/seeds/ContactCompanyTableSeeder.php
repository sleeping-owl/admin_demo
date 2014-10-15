<?php

// Composer: "fzaninotto/faker": "v1.4.0"
use Faker\Factory as Faker;

class ContactCompanyTableSeeder extends Seeder
{

	public function run()
	{
		$faker = Faker::create();

		DB::table('company_contact')->truncate();

		foreach (range(1, 30) as $index)
		{
			try
			{
				$company = Company::random();
				$contact = Contact::random();
				$contact->companies()->attach($company);
			} catch (\Exception $e)
			{
			}
		}
	}

}
