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
        Schema::create('interior_detail', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            // nombre de couchage
            $table->integer('nbOfSleeping');
            // nombre de salle de bain
            $table->integer('nbOfBathroom');
            // nombre de salle d'eau  
            $table->integer('nbOfRoomWater');
            // nombre de WC 
            $table->integer('nbOfWc');
            // caracteristique ensemble des input 
            $table->json('caracteristique');
            // surface carrez 
            $table->float('surfaceSquare');
            // surface sejour 
            $table->float('surfaceStay');
            // type de cuisine 
            $table->string('TypeOfKitchen');
            // etat du cuisine 
            $table->string('StateOfKitchen');
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
