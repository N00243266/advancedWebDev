<?php

use App\Http\Controllers\ProfileController;          // Profile controller
use App\Http\Controllers\ArtworkController;         // Artwork controller
use Illuminate\Support\Facades\Route;              // Route facade

Route::get('/', function () {                     // Home route
    return view('welcome');
});

Route::get('/dashboard', function () {                // Dashboard route
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {                                               // Authenticated routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');                    // Profile edit route
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');           // Profile update route
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');           // Profile destroy route
});


Route::get('/artworks/{artwork}/edit', [ArtworkController::class, 'edit'])->name('artworks.edit');      // Edit artwork route
Route::put('/artworks/{artwork}', [ArtworkController::class, 'update'])->name('artworks.update');      // Update artwork route

Route::get('/artworks', [ArtworkController::class, 'index'])->name('artworks.index');                // Artworks index route
Route::get('/artworks/create', [ArtworkController::class, 'create'])->name('artworks.create');      // Create artwork route
Route::get('/artworks/{artwork}', [ArtworkController::class, 'show'])->name('artworks.show');         
Route::post('/artworks', [ArtworkController::class, 'store'])->name('artworks.store');                  
Route::delete('/artworks/{artwork}', [ArtworkController::class, 'destroy'])->name('artworks.destroy');    // Show artwork route

//  Like system
Route::post('/artworks/{artwork}/toggle-like', [ArtworkController::class, 'toggleLike'])->name('artworks.toggleLike');           // Toggle like route
Route::get('/liked-artworks', [ArtworkController::class, 'liked'])->name('artworks.liked');                                 // Liked artworks route


require __DIR__.'/auth.php';


