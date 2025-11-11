<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;
use Carbon\Carbon;

class CommentSeeder extends Seeder
{
    public function run()
    {
        // Create 50 random comments
        Comment::factory()->count(50)->create();
    }
}
