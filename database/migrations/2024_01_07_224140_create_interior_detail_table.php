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
        // table detail interieur 
        Schema::create('interior_details', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            // nombre de couchage
            $table->integer('nbOfSleeping')->nullable();
            // nombre de salle de bain
            $table->integer('nbOfBathroom')->nullable();
            // nombre de salle d'eau  
            $table->integer('nbOfRoomWater')->nullable();
            // nombre de WC 
            $table->integer('nbOfWc')->nullable();
            // caracteristique ensemble des input 
            $table->json('caracteristique')->nullable();
            // surface carrez 
            $table->float('surfaceSquare')->nullable();
            // surface sejour 
            $table->float('surfaceStay')->nullable();
            // type de cuisine 
            $table->string('TypeOfKitchen')->nullable();
            // etat du cuisine 
            $table->string('StateOfKitchen')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interior_detail');
    }
};
