<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\RapportController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ActualiteController;

use App\Http\Controllers\UrgenceController;
use App\Http\Controllers\SignalementController;

Route::resource('urgences', UrgenceController::class)->only(['index', 'create', 'store', 'show']);

Route::get('/actualites', [ActualiteController::class, 'index'])->name('actualites.index');
Route::get('/actualites/{slug}', [ActualiteController::class, 'show'])->name('actualites.show');

Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/directions', [PublicController::class, 'directions'])->name('directions.index');
Route::get('/directions/{direction}', [PublicController::class, 'showDirection'])->name('directions.show');

Route::get('/projets', [ProjetController::class, 'index'])->name('projets.index');
Route::get('/projets/{projet}', [ProjetController::class, 'show'])->name('projets.show');

Route::get('/rapports', [RapportController::class, 'index'])->name('rapports.index');
Route::post('/rapports', [RapportController::class, 'store'])->name('rapports.store');
Route::get('/rapports/{rapport}', [RapportController::class, 'show'])->name('rapports.show');

Route::get('/test-livewire', function() {
return config('livewire.temporary_file_upload.chunk_size');
});

//Contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

// Route signalement
Route::resource('signalements', SignalementController::class)->only(['create', 'store']);

// L'heure time-zone
Route::get('/test-time', function(){
    return 'Heure: ' . now()->format('d/m/Y H:i:s') . '<br>Timezone: ' . config('app.timezone') . '<br>Date_fin DB: 05/07/2026';
});



