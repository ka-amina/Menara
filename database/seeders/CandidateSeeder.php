<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CandidateSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('candidates')->insert([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->unique()->safeEmail,
                'phone_number' => $faker->phoneNumber,
                'cv_path' => $faker->word . '.pdf',
                'status' => $faker->randomElement(['accepted', 'rejected', 'pending']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
