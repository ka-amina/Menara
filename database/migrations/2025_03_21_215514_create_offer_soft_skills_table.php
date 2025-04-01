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
        Schema::create('offer_soft_skills', function (Blueprint $table) {
            $table->foreignId('offer_id')->constrained()->onDelete('cascade');
            $table->foreignId('soft_skill_id')->constrained()->onDelete('cascade');
            $table->primary(['offer_id', 'soft_skill_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offer_soft_skills');
    }
};
