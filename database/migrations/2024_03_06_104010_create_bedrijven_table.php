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
        Schema::create('bedrijven', function (Blueprint $table) {
            $table->id();
            $table->string('naam');
            $table->string('bedrijfseigenaar');
            $table->integer('telefoonnummer');
            $table->string('straat');
            $table->string('huisnummer');
            $table->string('postcode');
            $table->string('branche');
            $table->dateTime('datum aanmaak');
            $table->dateTime('datum laatste activiteit');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bedrijven');
    }
};
