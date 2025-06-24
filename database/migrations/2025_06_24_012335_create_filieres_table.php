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
        Schema::create('filieres', function (Blueprint $table) {
            $table->id();
            $table->string('reference');
            $table->string('etablissement_id');
            $table->string('nom');
            $table->string('diplome_final');
            $table->string('diplome_requis');
            $table->string('duree');
            $table->string('montant_annuel');
            $table->string('mode_etude_id');
            $table->string('prise_en_charge');
            $table->string('type_filiere_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filieres');
    }
};
