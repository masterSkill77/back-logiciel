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

            //BIEN EN COPROPRIÉTÉ:
            $table->json('property_copropriete');
            // N° DE LOT
            $table->string('lot_number');
            //NB DE LOTS
            $table->integer('total_unit');
            //QUOTE PART ANUELLE CHARGES
            $table->string('annual_charges');
            //MONTANT FONDS DE TRAVAUX:
            $table->bigInteger('amount_fund');
            //MILLIÈMES DE COPROPRIÉTÉ:
            $table->string('thousands_copropriete');
            //PLAN DE SAUVEGARDE:
            $table->string('backupPlan');
            //status du syndicat
            $table->string('unionStatus');
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
