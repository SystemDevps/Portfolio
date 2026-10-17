<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Nombre del proyecto
            $table->string('slug')->unique();
            $table->text('description'); // Descripción
            $table->string('technologies')->nullable(); // Stack tecnológico
            $table->string('image_path')->nullable();
            $table->string('demo_url')->nullable();
            $table->string('github_url')->nullable();
            $table->date('completed_at')->nullable();
            $table->boolean('featured')->default(false);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
