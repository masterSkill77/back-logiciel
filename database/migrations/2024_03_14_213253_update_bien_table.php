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
        Schema::table('biens', function (Blueprint $table) {
            $table->dropColumn('sold');
            $table->dropColumn('publish');
            $table->string('published')->after('duration_lease')->default("Publié");
            $table->string('solds')->nullable()->after('published')->default("Vendu");
        });

        Schema::table('diagnostics', function (Blueprint $table) {
            $table->dropColumn('gaz');
            $table->dropColumn('electric');
            $table->integer('electric_diagnostic')->nullable()->after('amiante_yes_comments');
            $table->integer('gaz_diagnostic')->nullable()->after('electric_yes_comments');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('biens', function (Blueprint $table) {
            $table->dropColumn('sold');
            $table->dropColumn('publish');
        });
    }
};
