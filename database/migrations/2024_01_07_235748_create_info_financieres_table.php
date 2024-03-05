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
            $table->boolean('info_honoraire_charge')->nullable();

            // HONORAIRES CHARGE VENDEUR:
            $table->boolean('info_honoraire_locataire_part')->nullable();

            // PRIX LOYER MENSUEL:
            $table->integer('info_rent')->nullable();

            // ENCADREMENT DU LOYER = Loyer de base,  Loyer de reference majoré,  Loyer complement
            $table->json('info_rent_encadrement')->nullable();

            // HORAIRE 
            // PART locataire
            $table->json('info_tenant_chare')->nullable();
            // PART PROPRIETAIRE 
            $table->json('info_owner_share')->nullable();



            // total Charge locative 
            $table->integer('info_locative_charge_total')->nullable();
              // format Charge locative 
            $table->string('info_locative_charge_format')->nullable();

            // information Charge locative 
            $table->string('info_locative_charge_information')->nullable();

            // valeur de l'estimation 
            $table->integer('info_estimation_value')->nullable();
            // estimation date
            $table->date('info_estimation_date')->nullable();
            
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
