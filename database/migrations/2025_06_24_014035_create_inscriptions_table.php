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
            $table->string('user_id');
            $table->string('date_naissance');
            $table->string('genre');
            $table->string('ville');
            $table->string('commune_quartier');
            $table->string('telephone');
            $table->string('niveau_etude');
            $table->string('annee_obtention_diplome');
            $table->string('diplome_souhait');
            $table->string('mode_etude_id');
            $table->string('domaine_etude');
            $table->string('etablissement_id');
            $table->string('info_additionnel');
            $table->string('etat');
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
