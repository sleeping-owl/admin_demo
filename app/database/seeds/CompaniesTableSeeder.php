<?php

// Composer: "fzaninotto/faker": "v1.4.0"
use Faker\Factory as Faker;

class CompaniesTableSeeder extends Seeder
{

	public function run()
	{
		$faker = Faker::create();

		Company::deleteAll();

		foreach (range(1, 10) as $index)
		{
			Company::create([
				'title'   => $faker->company,
				'address' => $faker->streetAddress,
				'phone'   => $faker->phoneNumber
			]);
		}
	}

}
