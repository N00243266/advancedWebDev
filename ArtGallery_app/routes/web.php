<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArtworkController; 
use Illuminate\Support\Facades\Route;

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
});

Route::get('/artworks', [ArtworkController::class, 'index'])->name('artworks.index');
Route::get('/artworks/create', [ArtworkController::class, 'create'])->name('artworks.create');
Route::get('/artworks/{artwork}', [ArtworkController::class, 'show'])->name('artworks.show');
Route::post('/artworks', [ArtworkController::class, 'store'])->name('artworks.store');
Route::delete('/artworks/{artwork}', [ArtworkController::class, 'destroy'])->name('artworks.destroy'); 


require __DIR__.'/auth.php';


