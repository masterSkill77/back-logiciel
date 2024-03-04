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
             $table->string('surfaceBoutin')->nullable();
             //nombre de lots
            $table->integer('nbOfLots')->nullable();
             //plaque de cuisson
             $table->integer('hotplate')->nullable();
             //four
             $table->integer('oven')->nullable();
             //micro-onde
             $table->integer('microwave')->nullable();
             //congélateur
             $table->integer('freezer')->nullable();
             //refrigerateur
             $table->integer('fridge')->nullable();
             //lave-vaiselle
             $table->integer('dishwasher')->nullable();
             //cafetière
             $table->integer('coffeeMaker')->nullable();
             //grille-pain
             $table->integer('toaster')->nullable();
             //tv
             $table->integer('tv')->nullable();
             //internet
             $table->integer('internet')->nullable();
             //hifi
             $table->integer('hifi')->nullable();
             //lave-linge
             $table->integer('washingMachine')->nullable();
             //sèche-ligne
             $table->integer('dryer')->nullable();
             //fer à repasser
             $table->integer('iron')->nullable();
             //equipements bébé
            $table->integer('babyEquipment')->nullable();
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
