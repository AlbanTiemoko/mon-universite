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
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('reference');
            $table->foreignId('user_id')->constrained('users');
            $table->string('date_naissance');
            $table->string('genre');
            $table->string('ville');
            $table->string('commune_quartier');
            $table->string('telephone');
            $table->string('niveau_etude');
            $table->string('annee_obtention_diplome');
            $table->string('diplome_souhait');
            $table->foreignId('mode_etude_id')->constrained('mode_etudes');
            $table->string('domaine_etude');
            $table->foreignId('etablissement_id')->constrained('etablissements');
            $table->string('info_additionnel');
            $table->boolean('etat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscriptions');
    }
};
