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
        Schema::table('preference_contacts', function (Blueprint $table) {

            //SURFACE JARDIN SI EXISTE
            $table->integer('garden_exist_private')->nullable();
            //STATUT PISCINE SI EXISTE
            $table->string('swim_exist_statut')->nullable();
            //NATURE PISCINE SI EXISTE
            $table->string('swim_exist_nature')->nullable();
            //SOUS SOL AMNENAGE
            $table->string('basement_amenaged')->nullable();
            //CAVE
            $table->integer('cave_area')->nullable();
            //TERASSE
            $table->integer('teracce_area')->nullable();
            //BALCON
            $table->integer('balcony_area')->nullable();
            //VERANDA
            $table->integer('veranda_area')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('preference_contacts', function (Blueprint $table) {
            $table->dropColumn('swim_exist_area');
        });
    }
};
