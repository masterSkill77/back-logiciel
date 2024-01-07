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
            $table->unsignedBigInteger('id_infocopropriete');
            $table->string('numero_lots');
            $table->integer('nombre_lots');
            $table->string('quote_part');
            $table->bigInteger('montant_fond');
            $table->string('mille_copropriete');
            $table->json('bien_copropriete');
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
