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
        //NEGOCIATEUR IMMOBILLIER
        Schema::create('negotiators', function (Blueprint $table) {
            $table->unsignedBigInteger('id_negotiator');
            //NOM
            $table->string('name');
            //PRENOMS
            $table->string('lastname');
            //ADRESSE
            $table->string('address');
            //CONTACT
            $table->string('contact');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('negotiators');
    }
};
