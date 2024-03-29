<?php

use App\Models\Agency;
use App\Models\Bien;
use App\Models\Negotiator;
use App\Models\PreferenceContacts;
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
            $table->id('id_contact'); 
            //TYPE DE CONTACT
            $table->string('contact_type');
            //CIBLE
            $table->string('target');
            //CIVILITE
            $table->string('civility')->nullable();
            //PRENOM
            $table->string('firstname')->nullable();
            //NOM
            $table->string('lastname')->nullable();
            //FORME JURIDIQUE
            $table->string('legal_form')->nullable();
            //RAISON SOCIALE
            $table->string('company_name')->nullable();
            //SIRET
            $table->string('siret')->nullable();
            //TELEPHONE
            $table->string('phone')->nullable();
            //TELEPHONE FIXE
            $table->string('home_phone')->nullable();
            //MAIL
            $table->string('mail')->nullable();
            //PAYS
            $table->string('country_contact')->nullable();
            //VILLEcascadeOnDelete
            $table->string('city_contact')->nullable();
            //CODE POSTAL
            $table->string('zip_contact')->nullable();
            //ADRESSE
            $table->string('adress_contact')->nullable();
            //NEGOCIATEUR
            $table->string('negociator')->nullable(); //Agent
            //SOURCE DE CONTACT
            $table->string('contact_source');
            //NOTE
            $table->string('note')->nullable();
            //ACTIVATION ESPACE PERSO
            $table->boolean('space_perso_activate');
            //ACTIVATION ESPACE PROPRIO
            $table->boolean('space_proprio_activate');
            //INFOHOMME
            $table->json('man_info')->nullable();
            //INFOFEMME
            $table->json('woman_info')->nullable();
            //NEGOCIATEUR
            $table->foreignIdFor(User::class);
            //Préference
            $table->foreignIdFor(PreferenceContacts::class);
            //AGENCE
            $table->foreignIdFor(Agency::class)->cascadeOnDelete()->nullable()->default(null);

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
