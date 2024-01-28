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
        Schema::create('terrains', function (Blueprint $table) {
            $table->id();
            //terrain(piscinable, arboré, divisible)
            $table->json('ground');
            //EMPRISE AU SOL:
            $table->string('ground_print')->nullable();
            //EMPRISE AU SOL RÉSIDUELLE:
            $table->string('ground_print_residual')->nullable();
            //SHON:
            $table->string('shon')->nullable();
            //CES:
            $table->string('ces')->nullable();
            //CODIFICATION PLU:
            $table->string('codification_plu')->nullable();
            //DROIT DE PASSAGE:
            $table->string('right_way')->nullable();
            //RÉFÉRENCE CADASTRALE:
            $table->string('cadastral_ref')->nullable();
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('terrains');
    }
};
