<?php

use App\Models\Advertisement;
use App\Models\ClassificationOffert;
use App\Models\ClasssificationEstate;
use App\Models\Diagnostic;
use App\Models\ExteriorDetail;
use App\Models\InfoCopropriete;
use App\Models\InteriorDetail;
use App\Models\Photos;
use App\Models\Rental_Invest;
use App\Models\RentalInvest;
use App\Models\Sector;
use App\Models\TypeEstate;
use App\Models\TypeOffert;
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
        Schema::create('biens', function (Blueprint $table) {
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
            //EQUIPEMENT
            $table->json('equipment')->nullable();

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


            //RELATION
            //PHOTOS
            $table->foreignIdFor(Photos::class)->nullable();
            //INFOCOPROPRIETE
            $table->foreignIdFor(InfoCopropriete::class)->nullable();
            //TYPE D'OFFRE
            $table->foreignIdFor(TypeOffert::class);
            //TYPE DE BIEN
            $table->foreignIdFor(TypeEstate::class);
            //DETAIL INTERIEUR
            $table->foreignIdFor(InteriorDetail::class);
            //DETAIL EXTERIEUR
            $table->foreignIdFor(ExteriorDetail::class);
            //CLASSIFATION D'OFFRE
            $table->foreignIdFor(ClassificationOffert::class);
            //CLASSIFICATION DE BIEN
            $table->foreignIdFor(ClasssificationEstate::class);
            //DIAGNOSTICS
            $table->foreignIdFor(Diagnostic::class);
            //INVEST LOCATIF
            $table->foreignIdFor(RentalInvest::class);
            //SECTEUR
            $table->foreignIdFor(Sector::class);
            //ANNONCE
            $table->foreignIdFor(Advertisement::class);

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
