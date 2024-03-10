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
        Schema::create('sectors', function (Blueprint $table) {
            $table->id('id_sector'); 
            //PAYS DE L'ANNONCE
            $table->string('advertised_country');
            //CODE POSTAL PUBLIC 
            $table->string('public_zap');
            //VILLE PUBLIC
            $table->string ('public_country');
            //CODE POSTAL PRIVÉE
            $table->string('private_zap');
            //VILLE PRIVEE
            $table->string('private_country');
            //ADRESSE DE BIEN
            $table->string('property_address');
            //COMPLETEMENT D'ADRESSE
            $table->string('address_completed');
            //IMMEUBLE/BATIMENT
            $table->string('building');
            //PROXIMITE DES SERVICES
            $table->string('prox_service');
            //ENVIRONNEMENT
            $table->string('environment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sectors');
    }
};
