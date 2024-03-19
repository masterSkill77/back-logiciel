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
        Schema::create('diagnostics', function (Blueprint $table) {
            $table->id('id_diagnostics'); 

            //ANNÉE DE CONSTRUCTION:
            $table->integer('year_construction')->nullable();
            //DPE_DATE DE RÉALISATION
            $table->date('dpe_date_realization')->nullable();
            //DPE_BIEN:
            $table->boolean('dpe')->default(false);
            //DPE_CONSOMMATION
            $table->string('dpe_consommation')->nullable();
            //GES
            $table->string('dpe_ges')->nullable();
            //ESTIMATION COÛTS ANNUELS MOYENS (€):
            $table->integer('cost_estimate')->nullable();
            //ANNÉE DE RÉFÉRENCE: 
            $table->integer('ref_year')->nullable();
            //AMIANTE
            $table->integer('amiante')->nullable();
            //AMIANTE SI oui DATE
            $table->date('amiante_yes_date')->nullable();
            // AMIANTE SI oui COMMENTAIRE
            $table->string('amiante_yes_comments')->nullable();
            // ÉLECTRIQUE
            $table->integer('electric')->nullable();
            // ELECTRIQUE Si oui DATE
            $table->integer('electric_yes_date')->nullable();
            // ELECTRIQUE SI oui COMMENTAIRE 
            $table->string('electric_yes_comments')->nullable();
            // GAZ
            $table->integer('gaz')->nullable();
            // GAZ Si oui DATE
            $table->integer('gaz_yes_date')->nullable();
            // GAZ SI oui COMMENTAIRE 
            $table->string('gaz_yes_comments')->nullable();
             // PLOMB
             $table->integer('plomb')->nullable();
             // PLOMB Si oui DATE
             $table->integer('plomb_yes_date')->nullable();
             // PLOMB SI oui COMMENTAIRE 
             $table->string('plomb_yes_comments')->nullable();
            // LOI CARREZ
            $table->integer('loi_carrez')->nullable();
            // LOI CARREZ Si oui DATE
            $table->integer('loi_carrez_yes_date')->nullable();
            // LOI CARREZ SI oui COMMENTAIRE 
            $table->string('loi_carrez_yes_comments')->nullable();
            // ERP
            $table->integer('erp')->nullable();
            // ERP Si oui DATE
            $table->integer('erp_yes_date')->nullable();
            // ERP SI oui COMMENTAIRE 
            $table->string('erp_yes_comments')->nullable();
            // ÉTAT PARASITAIRE
            $table->integer('state_parasitaire')->nullable();
            // ÉTAT PARASITAIRE Si oui DATE
            $table->integer('state_parasitaire_yes_date')->nullable();
            // ÉTAT PARASITAIRE SI oui COMMENTAIRE 
            $table->string('state_parasitaire_yes_comments')->nullable();
             //ASSAINISSEMENT
            $table->integer('assainissement')->nullable();
            // ASSAINISSEMENT Si oui DATE
            $table->integer('assainissement_yes_date')->nullable();
            // ASSAINISSEMENT SI oui COMMENTAIRE 
            $table->string('assainissement_yes_comments')->nullable();    
            
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diagnostics');
    }
};
