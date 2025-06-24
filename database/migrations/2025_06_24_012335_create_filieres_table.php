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
            $table->foreignId('etablissement_id')->constrained('etablissements');
            $table->string('nom');
            $table->string('diplome_final');
            $table->string('diplome_requis');
            $table->tinyInteger('duree');
            $table->decimal('montant_annuel', 10, 7);
            $table->foreignId('mode_etude_id')->constrained('mode_etudes');
            $table->string('prise_en_charge');
            $table->foreignId('type_filiere_id')->constrained('type_filieres');
            $table->boolean('user_created_id')->nullable();
            $table->boolean('user_updated_id')->nullable();
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
