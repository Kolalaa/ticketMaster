<?php

use App\Http\Controllers\EntradaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArtistaController;
use App\Http\Controllers\ConcertController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstadistiqueController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('artistes', ArtistaController::class)
        ->parameters(['artistes' => 'artista']);

    Route::get('/concerts', [ConcertController::class, 'index'])
        ->name('concerts.index');

    Route::get('/concerts/create', [ConcertController::class, 'create'])
        ->name('concerts.create');

    Route::post('/concerts', [ConcertController::class, 'store'])
        ->name('concerts.store');

    Route::get('/concerts/{concert}', [ConcertController::class, 'show'])
        ->name('concerts.show');
    Route::get('/entrades', [EntradaController::class, 'mevesentrades'])->name('entrades.meves');
    Route::get('/concerts/{concert}/comprar', [EntradaController::class, 'create'])->name('entrades.create');
    Route::post('/concerts/{concert}/comprar', [EntradaController::class, 'store'])->name('entrades.store');
    Route::get('/concerts/{concert}/assistents', [EntradaController::class, 'assistents'])->name('entrades.assistents');

    Route::get('/estadistiques', [EstadistiqueController::class, 'index'])->name('estadistiques');
});


require __DIR__.'/auth.php';
