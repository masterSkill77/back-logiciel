<?php

use App\Models\TypeEstate;
use App\Models\TypeOffert;
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
        Schema::create('preference_contacts', function (Blueprint $table) {
            $table->unsignedBigInteger('id_preference')->autoIncrement();
            //Critères de recherches
            $table->string('criteria');
            //Budgets Min
            $table->double('min_budgets');
            //Budgetes Max
            $table->double('max_budgets');
            //Surface Habitable min

            $table->double('min_surface');
            //Surface Habitable Max
            $table->double('max_surface');
            //Nombre de pièces min
            $table->integer('min_room');
            ///Nombre de pièces Max
            $table->integer('max_room');
             //Nombre de chambres min
             $table->integer('min_bedroom');
             ///Nombre de chambres Max
             $table->integer('max_bedroom');
             //Localités
             $table->string('localities');
             //Commune
            $table->string('commune');
             //Code postal
            $table->string('zip');
            //date debut
            $table->date('start_date')->nullable();
            //date fin
            $table->date('end_date')->nullable();
            //nombre de nuits
            $table->integer('night_number')->nullable();
           //TYPE D'OFFRE
           $table->foreignIdFor(TypeOffert::class)->default(null);
           //TYPE DE BIEN
           $table->foreignIdFor(TypeEstate::class)->default(null);
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preference_contacts');
    }
};
