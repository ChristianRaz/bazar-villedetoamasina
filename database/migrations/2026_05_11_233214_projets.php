<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('projets', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('slug')->unique();
            $table->text('description');
            $table->string('image')->nullable();
            $table->string('video_url')->nullable(); // Lien YouTube
            $table->enum('statut', ['en_cours', 'termine', 'semaine'])->default('en_cours');
            $table->date('date_debut')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('projets');
    }
};
