<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('actualites', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('slug')->unique();
            $table->string('categorie')->default('Général');
            $table->text('contenu');
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->string('video_url')->nullable();
            $table->date('date_publication')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('actualites');
    }
};
