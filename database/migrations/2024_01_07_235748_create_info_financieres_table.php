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
            $table->integer('info_price')->nullable();
            $table->integer('info_rent')->nullable();
            $table->boolean('info_rent_encadrement')->nullable();
            // Loyer de base
            $table->integer('info_rent_default')->nullable();
            // Loyer de reference majoré
            $table->integer('info_rent_majored')->nullable();
            // Loyer complement
            $table->integer('info_rent_complement')->nullable();
            // Charge locative
            $table->integer('info_locative_charge_total')->nullable();
            $table->string('info_locative_charge_format')->nullable();

            // Honoraire charge
            $table->json('info_honoraire_charge')->nullable();

            $table->integer('info_estimation_value')->nullable();
            $table->date('info_estimation_date')->nullable();

            // Honoraire part du locataire
            $table->json('info_honoraire_locataire_part')->nullable();

            // Honoraire part du propriétaire
            $table->json('info_honoraire_proprio_part')->nullable();

            $table->string('info_predicted_work')->nullable();
            $table->integer('info_monthly_charge')->nullable();

            $table->string('info_garantied_deposit')->nullable();
            // Taxe
            $table->integer('info_fonciere_taxe')->nullable();
            $table->integer('info_habitation_taxe')->nullable();
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
