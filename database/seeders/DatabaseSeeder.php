<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'amina admin',
            'email' => 'amina@admin.com',
            'password' => Hash::make('amina12345'),
            'role' => 'admin',
        ]);
        // $this->call([
        //     CategorySeeder::class,
        //     HardSkillSeeder::class,
        //     SoftSkillSeeder::class,
        //     JobSeeder::class,
        //     CandidateSeeder::class,
        // ]);
    }
}
