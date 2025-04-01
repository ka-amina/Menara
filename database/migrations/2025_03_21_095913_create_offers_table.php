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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_id')->constrained()->onDelete('cascade');
            $table->enum('level', ['junior', 'mid', 'senior', 'lead']);
            $table->string('location')->nullable();
            $table->enum('location_type', ['onsite', 'remote', 'hybrid']);
            $table->string('requirements')->nullable();
            $table->enum('start_date', ['flexible', 'immediately']);
            $table->enum('contract_type', ['full-time', 'part-time', 'internship', 'CDI', 'CDD']);
            $table->enum('status', ['open', 'closed'])->default('open');
            $table->longText('about_offer')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
