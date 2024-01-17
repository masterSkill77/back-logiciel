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
        Schema::create('exterior_details', function (Blueprint $table) {
            $table->id();
            // metoyenneté 
            $table->string('semiOwnership')->nullable();
            // sous sol
            $table->string('basement')->nullable();
            // avec sous-sol 
            $table->float('withbasement')->nullable();
            // cave 
            $table->integer('cellar')->nullable();
            // avec cave 
            $table->float('trueCellar')->nullable();
            // balcon 
            $table->integer('balcony')->nullable();
            // avec le balcon
            $table->float('withBalcony')->nullable();
            // terrasse 
            $table->integer('terrace')->nullable();
            // avec terrasse 
            $table->float('withTerrace')->nullable();
            $table->integer('varangue')->nullable();
            $table->integer('loggia')->nullable();
            $table->integer('veranda')->nullable();
            $table->float('withVeranda')->nullable();
            // plain pied 
            $table->integer('singleStorey')->nullable();
            // type de residence 
            $table->string('typeResidence')->nullable();
            $table->string('formatResidence')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exterior_details');
    }
};
