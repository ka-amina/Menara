<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $informatiqueCategoryId = DB::table('categories')->where('name', 'Informatique')->value('id');
        $marketingCategoryId = DB::table('categories')->where('name', 'Marketing')->value('id');
        $financeCategoryId = DB::table('categories')->where('name', 'Finance')->value('id');
        $rhCategoryId = DB::table('categories')->where('name', 'Ressources Humaines')->value('id');
        $designCategoryId = DB::table('categories')->where('name', 'Design')->value('id');

        DB::table('jobs')->insert([
            ['title' => 'Développeur Laravel', 'description' => 'Développement et maintenance d\'applications Laravel.', 'category_id' => $informatiqueCategoryId],
            ['title' => 'Spécialiste SEO', 'description' => 'Optimisation du référencement naturel pour les sites web.', 'category_id' => $marketingCategoryId],
            ['title' => 'Analyste Financier', 'description' => 'Analyse et suivi des finances de l’entreprise.', 'category_id' => $financeCategoryId],
            ['title' => 'Responsable RH', 'description' => 'Gestion des talents et recrutement.', 'category_id' => $rhCategoryId],
            ['title' => 'Designer UI/UX', 'description' => 'Création d’expériences utilisateur optimisées.', 'category_id' => $designCategoryId],
        ]);
        $job1 = DB::table('jobs')->where('title', 'Développeur Laravel')->value('id');
        $job2 = DB::table('jobs')->where('title', 'Spécialiste SEO')->value('id');
        $job3 = DB::table('jobs')->where('title', 'Analyste Financier')->value('id');
        $job4 = DB::table('jobs')->where('title', 'Responsable RH')->value('id');
        $job5 = DB::table('jobs')->where('title', 'Designer UI/UX')->value('id');

        $skill1 = DB::table('hard_skills')->where('name', 'PHP Laravel')->value('id');
        $skill2 = DB::table('hard_skills')->where('name', 'Vue.js')->value('id');
        $skill3 = DB::table('hard_skills')->where('name', 'SQL')->value('id');
        $skill4 = DB::table('hard_skills')->where('name', 'Java')->value('id');
        $skill5 = DB::table('hard_skills')->where('name', 'Cybersecurity')->value('id');

        $jobHardSkills = [
            ['job_id' => $job1, 'hard_skill_id' => $skill1],
            ['job_id' => $job1, 'hard_skill_id' => $skill2],
            ['job_id' => $job2, 'hard_skill_id' => $skill3],
            ['job_id' => $job3, 'hard_skill_id' => $skill4],
            ['job_id' => $job4, 'hard_skill_id' => $skill5],
            ['job_id' => $job5, 'hard_skill_id' => $skill1],
        ];

        $skill1 = DB::table('soft_skills')->where('name', 'Communication')->value('id');
        $skill2 = DB::table('soft_skills')->where('name', 'Travail d’équipe')->value('id');
        $skill3 = DB::table('soft_skills')->where('name', 'Gestion du temps')->value('id');
        $skill4 = DB::table('soft_skills')->where('name', 'Adaptabilité')->value('id');
        $skill5 = DB::table('soft_skills')->where('name', 'Créativité')->value('id');

        $jobSoftSkills = [
            ['job_id' => $job1, 'soft_skill_id' => $skill1],
            ['job_id' => $job2, 'soft_skill_id' => $skill2],
            ['job_id' => $job3, 'soft_skill_id' => $skill3],
            ['job_id' => $job4, 'soft_skill_id' => $skill4],
            ['job_id' => $job5, 'soft_skill_id' => $skill5],
        ];

        DB::table('job_hard_skills')->insert($jobHardSkills);
        DB::table('job_soft_skills')->insert($jobSoftSkills);
    }
}
