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
        // Investissement locatif
        Schema::create('rental_invests', function (Blueprint $table) {
            $table->id('id_rental_invest'); 
            //LOYER ESTIMÉ
            $table->string('estimated_rent')->nullable();
            //Charges mensuelles locatives:
            $table->string('monthly_rent')->nullable();
            //RENDEMENT
            $table->string('yeld');
            //OCCUPATION
            $table->integer('occupancy')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rental__invests');
    }
};
