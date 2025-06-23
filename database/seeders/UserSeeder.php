<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    public function run()
    {


        $faker = Faker::create();
        $countries = ['Japan', 'France', 'USA', 'Germany', 'Brazil', 'China', 'India', 'Italy', 'Egypt', 'Canada'];

        foreach (range(1, 10) as $index) {
            User::create([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->phoneNumber,
                //'birth_of_date' => $faker->date(),
                'dob' => $faker->date(), // ← 両方必要なら
                'address1' => $faker->streetAddress,
                'address2' => $faker->secondaryAddress,
                'postal_code' => $faker->postcode,
                'country' => $countries[array_rand($countries)],
                //'status' => 'active',
                'password' => bcrypt('password'),
            ]);
        }
    }
}
