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
        // table detail exterieur 
        Schema::create('exterior_detail', function (Blueprint $table) {
            $table->id();
            // metoyenneté 
            $table->string('semiOwnership');
            // sous sol
            $table->string('basement');
            // avec sous-sol 
            $table->float('withbasement');
            // cave 
            $table->integer('cellar');
            // avec cave 
            $table->float('trueCellar');
            // balcon 
            $table->integer('balcony');
            // avec le balcon
            $table->float('withBalcony');
            // terrasse 
            $table->integer('terrace');
            // avec terrasse 
            $table->float('withTerrace');
            $table->integer('varangue');
            $table->integer('loggia');
            $table->integer('veranda');
            $table->float('withVeranda');
            // plain pied 
            $table->integer('singleStorey');
            // type de residence 
            $table->string('typeResidence');
            $table->string('formatResidence');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exterior_detail');
    }
};
