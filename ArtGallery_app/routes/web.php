<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArtworkController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\GalleryController;
use Illuminate\Support\Facades\Route;

// -------------------------------------------------------------
// Public Routes
// -------------------------------------------------------------
Route::get('/', function () {
    return view('welcome');
});

// -------------------------------------------------------------
// Dashboard (requires login)
// -------------------------------------------------------------
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// -------------------------------------------------------------
// Authenticated Routes
// -------------------------------------------------------------
Route::middleware('auth')->group(function () {

    // ---------------------------------------------------------
    // Profile
    // ---------------------------------------------------------
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ---------------------------------------------------------
    // Artworks CRUD
    // ---------------------------------------------------------
    Route::get('/artworks', [ArtworkController::class, 'index'])->name('artworks.index');
    Route::get('/artworks/create', [ArtworkController::class, 'create'])->name('artworks.create');
    Route::post('/artworks', [ArtworkController::class, 'store'])->name('artworks.store');

    Route::get('/artworks/{artwork}', [ArtworkController::class, 'show'])->name('artworks.show');
    Route::get('/artworks/{artwork}/edit', [ArtworkController::class, 'edit'])->name('artworks.edit');
    Route::put('/artworks/{artwork}', [ArtworkController::class, 'update'])->name('artworks.update');
    Route::delete('/artworks/{artwork}', [ArtworkController::class, 'destroy'])->name('artworks.destroy');

    // ---------------------------------------------------------
    // Likes
    // ---------------------------------------------------------
    Route::post('/artworks/{artwork}/toggle-like', [ArtworkController::class, 'toggleLike'])
        ->name('artworks.toggleLike');

    Route::get('/liked-artworks', [ArtworkController::class, 'liked'])
        ->name('artworks.liked');

    // ---------------------------------------------------------
    // Comments
    // ---------------------------------------------------------
    Route::post('/artworks/{artwork}/comments', [CommentController::class, 'store'])
        ->name('comments.store');

    Route::get('/comments/{comment}/edit', [CommentController::class, 'edit'])
        ->name('comments.edit');

    Route::put('/comments/{comment}', [CommentController::class, 'update'])
        ->name('comments.update');

    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])
        ->name('comments.destroy');



    // ---------------------------------------------------------
    // Galleries CRUD
    // ---------------------------------------------------------
    // Route::resource('galleries', GalleryController::class);
    Route::resource('galleries', GalleryController::class)->middleware('auth');



});

// -------------------------------------------------------------
// Authentication Routes
// -------------------------------------------------------------
require __DIR__.'/auth.php';
