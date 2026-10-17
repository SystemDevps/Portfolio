<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('job_title'); // Cargo
            $table->string('company'); // Empresa
            $table->string('location')->nullable(); // Ubicación
            $table->date('start_date');
            $table->date('end_date')->nullable(); // Null = Actualidad
            $table->boolean('current')->default(false);
            $table->text('description'); // Actividades / Logros
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
