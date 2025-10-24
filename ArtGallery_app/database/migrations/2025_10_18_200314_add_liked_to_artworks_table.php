<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration               /// add liked column to artworks table
{
    /**
     * Run the migrations.
     */
    public function up(): void                       // add liked column
    {
        Schema::table('artworks', function (Blueprint $table) {               // modify artworks table
             $table->boolean('liked')->default(false);                 // add liked column with default false
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void                   // remove liked column
    {
        Schema::table('artworks', function (Blueprint $table) {              // modify artworks table
            $table->dropColumn('liked');                                  // drop liked column
        });
    }
};
