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
        Schema::create('availabilities', function (Blueprint $table) {
            $table->unsignedBigInteger('id_availability')->autoIncrement();
            //N° Dossier
            $table->string('num_folder')->nullable();
            //Disponibilité immediate
            $table->integer('immediat')->nullable();
            //Libérer le
            $table->string('release_it')->nullable();
            //Disponibilité le 
            $table->string('available_on')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('availabilities');
    }
};
