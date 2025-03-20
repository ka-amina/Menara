<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('job_hard_skills',function(Blueprint $table){
            $table->foreignId('job_id')->constrained()->onDelete('cascade');
            $table->foreignId('hard_skill_id')->constrained()->onDelete('cascade');
            $table->primary(['job_id', 'hard_skill_id']);
            $table->timestamps();
        });
        Schema::create('job_soft_skills',function(Blueprint $table){
            $table->foreignId('job_id')->constrained()->onDelete('cascade');
            $table->foreignId('soft_skill_id')->constrained()->onDelete('cascade');
            $table->primary(['job_id', 'soft_skill_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_soft_skills');
        Schema::dropIfExists('job_hard_skills');
        Schema::dropIfExists('jobs');
        
    }
};
