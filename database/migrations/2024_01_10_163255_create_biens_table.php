<?php

use App\Models\Advertisement;
use App\Models\Agency;
use App\Models\Availabilities;
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
use App\Models\Terrain;
use App\Models\User;
use App\Models\InfoFinanciere;
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
            $table->id('id_bien'); 
            //PRIX
            //PRIX PUBLIC
            $table->float('publish_price')->nullable();
            //PRIX VENDEUR
            $table->float('selling_price')->nullable();

            //LOYER
            $table->float('rent')->nullable();
            //DURÉE BAIL
            $table->integer('duration_lease')->nullable();

            //SURFACE HABITABLE
            $table->float('living_area')->nullable();


            //NOMBRE DES PIECES
            $table->integer('number_room')->nullable();
            //NOMBRE DES CHAMBRES
            $table->integer('number_bedroom')->nullable();
            //NOMBRE DES NIVEAUX
            $table->integer('number_level')->nullable();

            //JARDIN EXISTE
            $table->integer('garden');
            //JARDIN EXISTE JARDIN
            $table->json('garden_exist')->nullable();

            //SURFACE TERRAIN
            $table->float('land_area')->nullable();

            //PISCINE
            $table->integer('swim');
            //PISCINE EXISTE (json)
            $table->json('swim_exist')->nullable();

            //NOMBRE DE GARAGE
            $table->string('number_garage')->nullable();
            //PARKING INTERIEUR
            $table->string('indoor_parking')->nullable();
            //PARKING EXTERIERUR
            $table->string('outdoor_parking')->nullable();

            //SITUATION (exposition et vue)
            $table->json('status');

            //PAYS
            $table->string('city')->nullable();
            //VILLE NOM
            $table->string('name_country')->nullable();
            //VILLE CODE POSTAL
            $table->string('zap_country')->nullable();

            //DOSSIER N° MANDAT
            $table->unsignedBigInteger('num_folder');
            //DOSSIER DATE CREATION
            $table->timestamp('date_folder');
            //EQUIPEMENT
            $table->json('equipment')->nullable();
            //CONSTRUCTION RECENTE
            $table->json('recent_construct')->nullable();
        
            //PUBLIE LE BIEN
            $table->boolean('publish_property')->default(false);

            // actif ou inactif inactif si null
            $table->boolean('publish')->default(false);
            // vendre ou a louer acheves si vendus
            $table->boolean('sold')->default(false);

            //RELATION
            //PHOTOS
            $table->foreignIdFor(Photos::class)->nullable()->default(null);
            //INFOCOPROPRIETE
            $table->foreignIdFor(InfoCopropriete::class)->nullable()->default(null);
            //TYPE D'OFFRE
            $table->foreignIdFor(TypeOffert::class)->nullable()->default(null);
            //TYPE DE BIEN
            $table->foreignIdFor(TypeEstate::class)->nullable()->default(null);
            //DETAIL INTERIEUR
            $table->foreignIdFor(InteriorDetail::class)->nullable()->default(null);
            //DETAIL EXTERIEUR
            $table->foreignIdFor(ExteriorDetail::class)->nullable()->default(null);
            //CLASSIFATION D'OFFRE
            $table->foreignIdFor(ClassificationOffert::class)->nullable()->default(null);
            //CLASSIFICATION DE BIEN
            $table->foreignIdFor(ClasssificationEstate::class)->nullable()->default(null);
            //DIAGNOSTICS
            $table->foreignIdFor(Diagnostic::class)->nullable()->default(null);
            //INVEST LOCATIF
            $table->foreignIdFor(RentalInvest::class)->nullable()->default(null);
            //SECTEUR
            $table->foreignIdFor(Sector::class)->nullable()->default(null);
            //ANNONCE
            $table->foreignIdFor(Advertisement::class)->nullable()->default(null);
            // terrain 
            $table->foreignIdFor(Terrain::class)->nullable()->default(null);
            // info financiere 
            $table->foreignIdFor(InfoFinanciere::class)->nullable()->default(null);

            $table->foreignIdFor(Agency::class)->cascadeOnDelete()->nullable()->default(null);

            $table->foreignIdFor(Availabilities::class)->nullable();

            $table->foreignIdFor(User::class, 'agent_id')->nullable()->default(null);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biens');
    }
};
