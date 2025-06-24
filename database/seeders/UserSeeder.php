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

        // ランダムなユーザー10人
        foreach (range(1, 10) as $index) {
            User::create([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->phoneNumber,
                'dob' => $faker->date(),
                'address1' => $faker->streetAddress,
                'address2' => $faker->secondaryAddress,
                'postal_code' => $faker->postcode,
                'country' => $countries[array_rand($countries)],
                'password' => bcrypt('password'),
            ]);
        }

        // 固定ユーザー（Emily）
        User::create([
            'first_name' => 'Emily',
            'last_name' => 'Smith',
            'email' => 'emily@example.com',
            'phone' => '080-1111-1111',
            'dob' => '1990-01-01',
            'address1' => 'Tokyo',
            'address2' => '',
            'postal_code' => '1000001',
            'country' => 'Japan',
            'password' => bcrypt('password'),
        ]);

        // Sarah
        User::create([
            'first_name' => 'Sarah',
            'last_name' => 'Johnson',
            'email' => 'sarah@example.com',
            'password' => bcrypt('password'),
        ]);

        // Michael
        User::create([
            'first_name' => 'Michael',
            'last_name' => 'Brown',
            'email' => 'michael@example.com',
            'password' => bcrypt('password'),
        ]);
    }
}
