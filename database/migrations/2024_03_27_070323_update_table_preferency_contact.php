<?php

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
        Schema::table('preference_contacts', function (Blueprint $table) {
            //remove commune
            $table->dropColumn('commune');
            //remove Code postal
           $table->dropColumn('zip');
        });

        Schema::table('biens', function(Blueprint $table){
            //uuid bien
            $table->string('uuid')->nullable()->default(Uuid::uuid4()->toString());
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
