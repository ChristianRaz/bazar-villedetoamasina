<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('contribuable', function (Blueprint $table) {
            $table->id(); // <- unsignedBigInteger. Match avec foreignId
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->string('nif')->unique()->nullable(); // NIF CUT
            $table->string('tel')->nullable();
            $table->string('adresse')->nullable();
            $table->string('quartier')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('contribuable'); }
};
