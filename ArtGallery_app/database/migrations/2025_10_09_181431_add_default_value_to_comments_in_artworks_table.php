<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('artworks', function (Blueprint $table) {
               $table->text('comments')->default('')->change();
        });
    }


    public function down(): void
    {
        Schema::table('artworks', function (Blueprint $table) {
               $table->text('comments')->default(null)->change();
        });
    }
};



