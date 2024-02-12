<?php

use App\Models\Agency;
use App\Models\Bien;
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
        Schema::create('folders', function (Blueprint $table) {
            $table->id();
            $table->uuid('folder_uuid')->default(Uuid::uuid4());
            $table->string('folder_type');
            $table->foreignIdFor(Bien::class);
            $table->foreignIdFor(Agency::class);
            $table->string('num_mandat');
            $table->date('date_signature');
            $table->date('debut_bail')->nullable();
            $table->date('fin_bail')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('folders');
    }
};
