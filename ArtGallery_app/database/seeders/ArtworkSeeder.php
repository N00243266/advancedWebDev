<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Artwork;

class ArtworkSeeder extends Seeder
{
    public function run(): void
    {
        $currentTimestamp = Carbon::now();

        Artwork::insert([
            [
                'title' => 'Starry Night',
                'genre' => 'Post-Impressionism',
                'image' => 'ArtGallery_app/public/images/starry_night.jpg',
                'description' => 'A famous painting by Vincent van Gogh.',
                'artist' => 'Vincent van Gogh',
                'year' => '1889-06-01',
                'price' => '$100 million',
                'comments' => 'One of the most recognized pieces of art in the world.',
            ],
            [
                'title' => 'Mona Lisa',
                'genre' => 'Renaissance',
                'image' => 'images/mona_lisa.jpg',
                'description' => 'A portrait painting by Leonardo da Vinci.',
                'artist' => 'Leonardo da Vinci',
                'year' => '1503-10-01',
                'price' => '$860 million',
                'comments' => 'Famous for her enigmatic expression.',
            ],
            [
                'title' => 'The Persistence of Memory',
                'genre' => 'Surrealism',
                'image' => 'persistence_of_memory.jpg',
                'description' => 'A surreal painting by Salvador Dalí.',
                'artist' => 'Salvador Dalí',
                'year' => '1931-04-01',
                'price' => '$150 million',
                'comments' => "Known for its melting clocks.",
            ],

          
        ]);

    }
}
