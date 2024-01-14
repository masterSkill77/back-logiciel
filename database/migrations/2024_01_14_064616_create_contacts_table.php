<?php

use App\Models\Bien;
use App\Models\Negotiator;
use App\Models\User;
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
        Schema::create('contacts', function (Blueprint $table) {
            $table->unsignedBigInteger('id_contact');
            //TITRE DE CONTACT
            $table->string('title');
            //TYPE DE CONTACT
            $table->json('sort');
            //INFO PRINCIPALES
            $table->json('main_info');
            //ACTIVATION ESPACE PERSO
            $table->boolean('space_perso_activate');
            //ACTIVATION ESPACE PROPRIO
            $table->boolean('space_proprio_activate');
            //BIEN
            $table->foreignIdFor(Bien::class)->nullable();
            //USER
            $table->foreignIdFor(User::class);
            //NEGOCIATEUR
            $table->foreignIdFor(Negotiator::class)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
