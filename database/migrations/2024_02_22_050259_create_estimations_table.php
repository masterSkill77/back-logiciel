<?php

use App\Models\Agency;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Uuid;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('estimations', function (Blueprint $table) {
            $table->id();
            $table->string('bien');
            $table->string('demandeur_firstname', 70);
            $table->string('demandeur_lastname', 70);
            $table->string('demandeur_email', 70);
            $table->json('details_bien');
            $table->uuid('estimation_uuid')->default(Uuid::uuid4());

            $table->unsignedBigInteger('agency_id');
            $table->foreign('agency_id')->references('id')->on(Agency::class);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estimations');
    }
};
