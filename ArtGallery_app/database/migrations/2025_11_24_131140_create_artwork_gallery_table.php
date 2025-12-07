<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void // Create the pivot table for artworks and galleries
    {
        Schema::create('artwork_gallery', function (Blueprint $table) {
            $table->id();
            $table->foreignId('artwork_id')->constrained()->onDelete('cascade'); // Foreign key to artworks table
            $table->foreignId('gallery_id')->constrained()->onDelete('cascade'); // Foreign key to galleries table
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artwork_gallery'); // Drop the pivot table
    }
};
