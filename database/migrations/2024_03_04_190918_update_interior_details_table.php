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
        Schema::table('interior_details', function (Blueprint $table) {
             //surface boutin
             $table->float('surfaceBoutin')->nullable();
             //nombre de lots
             $table->integer('nbOfLots')->nullable();
             //Equipement de cuisine
             $table->json('kitchenEquipment')->nullable();
             //Multimedia
             $table->json('multimedia')->nullable();
             //Autres equipements
             $table->json('othersEquipment')->nullable();
            //nombre de baignoires
            $table->integer('nbOfBathtubs')->nullable();
            //nombre de douches
            $table->integer('nbOfShowers')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('interior_details', function (Blueprint $table) {
            //
        });
    }
};
