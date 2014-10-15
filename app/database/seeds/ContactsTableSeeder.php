<?php

// Composer: "fzaninotto/faker": "v1.4.0"
use Faker\Factory as Faker;

class ContactsTableSeeder extends Seeder
{

	public function run()
	{
		$faker = Faker::create();

		$files = \Symfony\Component\Finder\Finder::create()->files()->in(public_path('images/contacts/seeds'));
		$photos = [];
		foreach ($files as $file)
		{
			$photos[] = 'seeds/' . $file->getFilename();
		}

		foreach (range(1, 30) as $index)
		{
			Contact::create([
				'firstName'  => $faker->firstName,
				'lastName'   => $faker->lastName,
				'birthday'   => $faker->dateTimeThisCentury,
				'phone'      => $faker->phoneNumber,
				'address'    => $faker->address,
				'country_id' => Country::random()->id,
				'comment'    => $faker->paragraph(5),
				'photo'      => $faker->randomElement($photos)
			]);
		}
	}

}
