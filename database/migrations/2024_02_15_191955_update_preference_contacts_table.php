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
            //NOMBRE DES NIVEAUX
            $table->integer('number_level')->nullable();
            //NOMBRE DE SALLE DE WC
            $table->integer('number_wc')->nullable();
            //JARDIN EXISTE
            $table->integer('garden_exist')->nullable();
            //SURFACE JARDIN SI EXISTE
            $table->float('garden_exist_area')->nullable();
            //SURFACE TERRAIN
            $table->float('land_area')->nullable();
            //PISCINE
            $table->integer('swim')->nullable();
            //SURFACE PISCINE SI EXISTE
            $table->float('swim_exist_area')->nullable();
            //NOMBRE DE GARAGE
            $table->integer('garage_number')->nullable();
            //PARKING INTERIEUR
            $table->integer('indoor_parking')->nullable();
            //PARKING EXTERIEUR
            $table->integer('outdoor_parking')->nullable();
            //EXPOSITION
            $table->string('exhibition')->nullable();
            //VUE
            $table->string('view')->nullable();
            //GRENIER(COMBLE)
            $table->integer('attic')->nullable();
            //CELLIER
            $table->integer('cellar')->nullable();
            //MEUBLES
            $table->integer('furnished')->nullable();
            //SURFACE CARREZ
            $table->float('carrez_area')->nullable();
            //SURFACE SEJOUR
            $table->float('stay_area')->nullable();
            //MITOYENNETE
            $table->string('common_ownership')->nullable();
            //SOUS SOL
            $table->string('basement')->nullable();
            //CAVE
            $table->integer('cave')->nullable();
            //TERASSE
            $table->integer('teracce')->nullable();
            //LOGGIA
            $table->integer('logia')->nullable();
            //PLAIN PIED
            $table->integer('ground_floor')->nullable();
            //BALCON
            $table->integer('balcony')->nullable();
            //VARANGUE
            $table->integer('varangue')->nullable();
            //VERANDA
            $table->integer('veranda')->nullable();
            //FORMAT DE CHAUFFAGE
            $table->string('heating_format')->nullable();
            //TYPE DE CHAUFFAGE
            $table->string('heating_type')->nullable();
            //ENERGIE DE CHAUFFAGE
            $table->string('heating_energy')->nullable();
            //ASCENCEUR
            $table->integer('elevator')->nullable();
            //CLIMATISATION
            $table->integer('air_conditionning')->nullable();
            //CHEMINEE
            $table->integer('fireplace')->nullable();
            //VITRAGE
            $table->string('glazing')->nullable();
            //EMPRISE AU SOL
            $table->string('ground_surface')->nullable();
            //PISCINABLE
            $table->integer('poolable')->nullable();
            //ARBORE
            $table->integer('wooded')->nullable();
            //DIVISIBLE
            $table->integer('divisible')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('preference_contacts', function (Blueprint $table) {
            //
        });
    }
};
