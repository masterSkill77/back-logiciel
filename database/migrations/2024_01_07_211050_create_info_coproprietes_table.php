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
        Schema::create('info_coproprietes', function (Blueprint $table) {
            $table->id('id_infocopropriete');

            // N° DE LOT
            $table->string('lot_number')->nullable();
            //NB DE LOTS
            $table->integer('total_unit')->nullable();
            //QUOTE PART ANUELLE CHARGES
            $table->string('annual_charges')->nullable();
            //MONTANT FONDS DE TRAVAUX:
            $table->bigInteger('amount_fund')->nullable();
            //MILLIÈMES DE COPROPRIÉTÉ:
            $table->string('thousands_copropriete')->nullable();
            //BIEN EN COPROPRIÉTÉ:
            $table->json('property_copropriete')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('info_coproprietes');
    }
};
