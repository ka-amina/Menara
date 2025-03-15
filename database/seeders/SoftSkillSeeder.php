<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SoftSkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('soft_skills')->insert([
            ['name' => 'Communication'],
            ['name' => 'Travail d’équipe'],
            ['name' => 'Gestion du temps'],
            ['name' => 'Adaptabilité'],
            ['name' => 'Créativité'],
            ['name' => 'Leadership'],
        ]);

    }
}
