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
