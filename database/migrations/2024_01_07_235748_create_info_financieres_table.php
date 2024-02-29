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
        Schema::create('info_financieres', function (Blueprint $table) {
            $table->id();
            // PRIX NET VENDEUR (€)
            $table->integer('info_price')->nullable();

            // HONORAIRES CHARGE ACQUÉREUR:
            $table->json('info_honoraire_charge')->nullable();

            // HONORAIRES CHARGE VENDEUR:
            $table->json('info_honoraire_locataire_part')->nullable();

            // PRIX LOYER:
            $table->integer('info_rent')->nullable();
            // ENCADREMENT DU LOYER
            $table->boolean('info_rent_encadrement')->nullable();
            // Loyer de base
            $table->integer('info_rent_default')->nullable();
            // Loyer de reference majoré
            $table->integer('info_rent_majored')->nullable();
            // Loyer complement
            $table->integer('info_rent_complement')->nullable();
            // Loyer information
            $table->integer('info_information')->nullable();
            // Loyer format 
            $table->integer('info_format')->nullable();

            // Loyer total 
            $table->integer('info_total')->nullable();

            // Etat des lieux M2
            $table->integer('inventoryM2')->nullable();

            //Montant
            $table->integer('risingM2')->nullable();


            //%
            $table->integer('percent')->nullable();


            //%
            $table->integer('rising')->nullable();


            //Dont etat des lieux
            $table->integer('includingStatusOfPremises')->nullable();


            // total Charge locative 
            $table->integer('info_locative_charge_total')->nullable();
              // format Charge locative 
            $table->string('info_locative_charge_format')->nullable();

            // valeur de l'estimation 
            $table->integer('info_estimation_value')->nullable();
            // estimation date
            $table->date('info_estimation_date')->nullable();
            
            // Honoraire part du propriétaire
            $table->json('info_honoraire_proprio_part')->nullable();
            // Travaux à prevoir:
            $table->string('info_predicted_work')->nullable();
            // Charges mensuelles:
            $table->integer('info_monthly_charge')->nullable();
            // Dépôt de garantie
            $table->string('info_garantied_deposit')->nullable();
            // Taxe foncière:
            $table->integer('info_fonciere_taxe')->nullable();
            // Taxe d'habitation:
            $table->integer('info_habitation_taxe')->nullable();
            // Taxe ordure menager 
            $table->integer('info_ordure_menagere_taxe')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('info_financieres');
    }
};
