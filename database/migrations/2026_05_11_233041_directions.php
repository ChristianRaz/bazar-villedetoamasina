<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('directions', function (Blueprint $table) {
            $table->id();
            $table->string('nom'); // Ex: Gendarmerie, Pompier
            $table->string('slug')->unique(); // gendarmerie
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->integer('ordre')->default(0); // Pour trier les menus
            $table->foreignId('parent_id')->nullable()->constrained('directions')->onDelete('cascade'); // Sous-menu
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('directions');
    }
};
