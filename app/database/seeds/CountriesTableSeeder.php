<?php

// Composer: "fzaninotto/faker": "v1.4.0"
use Faker\Factory as Faker;

class CountriesTableSeeder extends Seeder
{

	public function run()
	{
		$faker = Faker::create();

		Country::deleteAll();

		foreach (range(1, 10) as $index)
		{
			try
			{
				Country::create([
					'title' => $faker->country
				]);
			} catch (\Exception $e)
			{
			}
		}
	}

}
