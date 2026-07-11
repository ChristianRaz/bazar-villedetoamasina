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
        Schema::create('paiement_taxes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Pour la Policy
            $table->foreignId('contribuable_id')->constrained('contribuable')->onDelete('cascade');
            $table->string('type_taxe'); // 'taxe_marche', 'patente'
            $table->string('periode'); // '2025-10'
            $table->integer('montant');
            $table->string('operateur'); // MVola, Orange, Airtel
            $table->string('numero_paiement'); // 034...
            $table->string('preuve_paiement')->nullable(); // chemin du fichier upload
            $table->enum('statut', ['En attente', 'En attente de vérification', 'Vérifié', 'Rejeté'])->default('En attente');
            $table->string('transaction_id')->nullable(); // Pour l’API plus tard
            $table->text('note_admin')->nullable(); // Pour que l’agent CUT mette "Capture floue"
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paiement_taxes');
    }
};
