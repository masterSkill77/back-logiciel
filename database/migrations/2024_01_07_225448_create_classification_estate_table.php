<?php

use App\Models\TypeEstate;
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
        Schema::create('classification_estate', function (Blueprint $table) {
            $table->id();
            $table->string('designation');
            $table->foreignIdFor(TypeEstate::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classification_estate');
    }
};
