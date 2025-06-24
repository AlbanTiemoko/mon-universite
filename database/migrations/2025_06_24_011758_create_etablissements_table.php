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
        Schema::create('etablissements', function (Blueprint $table) {
            $table->id();
            $table->string('reference');
            $table->string('nom');
            $table->string('numero');
            $table->string('deuxieme_numero');
            $table->string('email');
            $table->string('logo');
            $table->string('cover');
            $table->string('longitude');
            $table->string('lagitude');
            $table->string('url_spot');
            $table->text('description');
            $table->boolean('etat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etablissements');
    }
};
