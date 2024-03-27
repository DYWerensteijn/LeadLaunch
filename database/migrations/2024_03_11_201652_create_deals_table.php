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
        Schema::create('deals', function (Blueprint $table) {
            $table->id();
            $table->string('Gekoppeld bedrijf');
            $table->string('Gekoppeld contact');
            $table->string('afspraak ingepland');
            $table->string('gekwalificeerd om te kopen');
            $table->string('presentatie ingepland');
            $table->string('besluitnemer ingebracht');
            $table->string('contract verzonden');
            $table->string('sluiting gewonnen');
            $table->string('sluiting verloren');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deals');
    }
};
