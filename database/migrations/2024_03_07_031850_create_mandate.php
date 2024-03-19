<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Bien;
use App\Models\Contact;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mandates', function (Blueprint $table) {
            $table->id('id_mandate'); 
            // association 
            $table->integer('num_mandat')->nullable();
            // personne
            $table->string('person')->nullable();
            //RELATION
            //BIEN
            $table->foreignIdFor(Bien::class)->nullable()->default(null);
            // CONTACT
            $table->foreignIdFor(Contact::class)->nullable()->default(null);
          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mandates');
    }
};
