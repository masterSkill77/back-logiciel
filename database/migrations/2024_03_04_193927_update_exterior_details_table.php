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
        Schema::table('exterior_details', function (Blueprint $table) {
            //Barbecue
            $table->integer('barbecue')->nullable();
            //Jacuzzi
            $table->integer('jacuzzi')->nullable();
            //velos
            $table->integer('bikes')->nullable();
            //tennis
            $table->integer('tennis')->nullable();
            //cuisine d'été
            $table->integer('summerKitchen')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('exterior_details', function (Blueprint $table) {
            //
        });
    }
};
