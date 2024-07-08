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
        Schema::create('emploie_ens', function (Blueprint $table) {
            $table->id();
            $table->string('jour');
            $table->time('Heure_debut');
            $table->time('Heure_fin');
            $table->foreignId('groupe_id')->constrained()->cascadeOnDelete();
            $table->foreignId('enseignant_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('module_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emploie_ens');
    }
};
