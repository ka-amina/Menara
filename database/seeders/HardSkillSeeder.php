<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HardSkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hard_skills')->insert([
            ['name' => 'PHP Laravel'],
            ['name' => 'Vue.js'],
            ['name' => 'SQL'],
            ['name' => 'Machine Learning'],
            ['name' => 'Java'],
            ['name' => 'Python'],
            ['name' => 'Cybersecurity'],
        ]);
    }
}
