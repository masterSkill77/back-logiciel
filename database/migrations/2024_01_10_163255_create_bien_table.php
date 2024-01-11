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
        Schema::create('bien', function (Blueprint $table) {
            $table->unsignedBigInteger('id_bien');
            //PAYS
            $table->string('city')->nullable();
            //VILLE NOM
            $table->string('name_country')->nullable();
            //VILLE CODE POSTAL
            $table->string('zap_country')->nullable();
            //SURFACE HABITABLE
            $table->float('living_area')->nullable();
            //SURFACE TERRAIN
            $table->float('land_area')->nullable();
            //NOMBRE DES PIECES
            $table->integer('number_room')->nullable();
            //NOMBRE DES CHAMBRES
            $table->integer('number_bedroom')->nullable();
            //NOMBRE DES NIVEAUX
            $table->integer('number_level')->nullable();
            //JARDIN EXISTE
            $table->integer('garden_exist');
            //JARDIN EXISTE JARDIN
            $table->float('garden_exist_area')->nullable();
            //JARDIN EXISTE PRIVATIF
            $table->integer('garden_exist_private')->nullable();
            //PISCINE
            $table->integer('swim');
            //PISCINE EXISTE (json)
            $table->json('swim_exist')->nullable();
            //PISCINE EXISTE VOLUME
            $table->float('swim_exist_volume')->nullable();
            //PISCINE EXISTE DIMENSIONS
            $table->string('swim_exist_dimensions')->nullable();
            //PISCINE EXISTE TRAITEMENT
            $table->string('swim_sxist_treatment')->nullable();
            //NOMBRE DE GARAGE
            $table->integer('number_garage')->nullable();
            //PARKING INTERIEUR
            $table->string('indoor_parking')->nullable();
            //PARKING EXTERIERUR
            $table->string('outdoor_parking')->nullable();
            //SITUATION
            $table->json('status');
            //DOSSIER N° MANDAT
            $table->unsignedBigInteger('num_folder');
            //DOSSIER DATE CREATION
            $table->timestamp('date_folder');

            //SECTEUR
            //PAYS DE L'ANNONCE
            $table->string('advertised_country');
            //CODE POSTAL PUBLIC 
            $table->string('public_zap');
            //VILLE PUBLIC
            $table->string ('public_country');
            //CODE POSTAL PRIVÉE
            $table->string('private_zap');
            //VILLE PRIVEE
            $table->string('private_country');
            //ADRESSE DE BIEN
            $table->string('property_address');
            //COMPLETEMENT D'ADRESSE
            $table->string('address_completed');
            //IMMEUBLE/BATIMENT
            $table->string('building');
            //PROXIMITE DES SERVICES
            $table->string('prox_service');
            //ENVIRONNEMENT
            $table->string('environment');
            //MAP
            $table->json('map');


            //PRIX
            //PRIX PUBLIC
            $table->float('publish_price')->nullable();
            //PRIX VENDEUR
            $table->float('selling_price')->nullable();
            //PUBLIE LE BIEN
            $table->boolean('publish_property')->default(false);
            //LOYER
            $table->float('rent')->nullable();
            //DURÉE BAIL
            $table->integer('duration_lease')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bien');
    }
};
