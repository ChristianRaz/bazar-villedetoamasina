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
    Schema::table('rapports', function (Blueprint $table) {
        // Ajoute commentaire seulement s'il manque
        if (!Schema::hasColumn('rapports', 'commentaire')) {
            $table->text('commentaire')->nullable()->after('fichier_pdf');
        }

        // Supprime 1 par 1 seulement si existe
        if (Schema::hasColumn('rapports', 'titre')) {
            $table->dropColumn('titre');
        }
        if (Schema::hasColumn('rapports', 'description')) {
            $table->dropColumn('description');
        }
        if (Schema::hasColumn('rapports', 'fichier')) {
            $table->dropColumn('fichier');
        }
        if (Schema::hasColumn('rapports', 'annee')) {
            $table->dropColumn('annee');
        }
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rapports', function (Blueprint $table) {
            //
        });
    }
};
