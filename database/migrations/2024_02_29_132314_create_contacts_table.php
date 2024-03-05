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
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('e-mail');
            $table->integer('phone_number');
            $table->string('primary_company');
            $table->string('city');
            $table->string('contact_owner');
            $table->set('lead_status', ['nieuw','openen','in behandeling','deal openen','ongeklawilificeerd','geprobeerd contact op te nemen met','verbonden','slechte timing']);
            $table->dateTime('last_activity')->useCurrent();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
