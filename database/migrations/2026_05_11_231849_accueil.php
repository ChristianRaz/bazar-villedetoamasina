<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('pages_accueil', function (Blueprint $table) {
            $table->id();
            $table->string('projet_semaine_titre')->nullable();
            $table->text('projet_semaine_description')->nullable();
            $table->string('projet_semaine_image')->nullable();
            $table->text('mot_maire_texte')->nullable();
            $table->string('mot_maire_photo')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('pages_accueil');
    }
};
