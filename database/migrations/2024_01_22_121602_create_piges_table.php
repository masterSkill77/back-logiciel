<?php

use App\Models\Agency;
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
        Schema::create('piges', function (Blueprint $table) {
            $table->id();
            $table->string('bien')->nullable();
            $table->string('type')->nullable();
            $table->string('ville')->nullable();
            $table->integer('cp')->nullable();
            $table->string('titre')->nullable();
            $table->string('texte')->nullable();
            $table->string('date')->nullable();
            $table->integer('prix')->nullable();
            $table->integer('prix_evolution')->nullable();
            $table->integer('loyer_cc')->nullable();
            $table->integer('meuble')->nullable();
            $table->integer('pieces')->nullable();
            $table->integer('chambres')->nullable();
            $table->integer('surface')->nullable();
            $table->json('sources')->nullable();
            $table->string('img')->nullable();
            $table->string('tel_1')->nullable();
            $table->string('tel_2')->nullable();
            $table->boolean('stop')->nullable();
            $table->string("stop_date")->nullable();
            $table->string('email')->nullable();
            $table->json('annonceur')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('adresse')->nullable();
            $table->integer('maj')->nullable();
            $table->string('bloctel')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('piges');
    }
};
