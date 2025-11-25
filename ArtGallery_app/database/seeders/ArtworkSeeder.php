<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Artwork;
use App\Models\Gallery;

class ArtworkSeeder extends Seeder
{
    public function run(): void
    {
        $artworks = [
            [
                'title' => 'Son Of The Mourning',
                'genre' => 'Surrealism, Expressionism, Symbolic',
                'image' => '1763998858_IMG_2913.jpg',
                'description' => 'A famous painting by Vincent van Gogh.',
                'artist' => 'Diana Kovika',
                'year' => '2022-07-19',
                'price' => '150000000',
                'commentsA' => 'One of my first works here in Ireland. Was depressed when I made it. Acrylic, canvas, don\'t remember the size',
                'liked' => 1,
            ],
            [
                'title' => 'Mona Lisa',
                'genre' => 'Renaissance',
                'image' => '1763994639_butthead in school.jpeg',
                'description' => 'A portrait painting by Leonardo da Vinci.',
                'artist' => 'Leonardo da Vinci',
                'year' => '1503-10-01',
                'price' => '870000000000',
                'commentsA' => 'Famous for her enigmatic expression.',
                'liked' => 0,
            ],
            [
                'title' => 'Morbid Land',
                'genre' => 'Surrealism, Horror, Nature',
                'image' => '1763995205_morbid_land.jpg',
                'description' => 'A surreal painting by Salvador Dalí.',
                'artist' => 'Diana Kovika',
                'year' => '2024-02-17',
                'price' => '777777777777777',
                'commentsA' => 'The idea for this painting evolved through time, I would describe it as beautiful in a scary way. Personally one of my favourites. Acrylics, canvas 50X60cm',
                'liked' => 1,
            ],
            [
                'title' => 'Human Scull',
                'genre' => 'Anatomy, Realism',
                'image' => '1763995546_scull.JPG',
                'description' => null,
                'artist' => 'Diana Kovika',
                'year' => '2022-08-08',
                'price' => '10000000',
                'commentsA' => 'Anatomy drawing was a part of my final year project in Kyiv Polytechnic Institute. I have a series of artworks with bones. The scull is my favourite',
                'liked' => 1,
            ],
            [
                'title' => 'Eyes',
                'genre' => 'Surrealism, Expressionism, Abstract',
                'image' => '1763995765_eyes2.jpg',
                'description' => null,
                'artist' => 'Diana Kovika',
                'year' => '2024-07-13',
                'price' => '1000000000',
                'commentsA' => 'One of my recent works, no particular meaning',
                'liked' => 1,
            ],
            [
                'title' => 'Still Life',
                'genre' => 'Still life, Watercolour',
                'image' => '1763996026_aquarel.JPG',
                'description' => null,
                'artist' => 'Diana Kovika',
                'year' => '2022-04-02',
                'price' => '10000000',
                'commentsA' => 'One of my works for university. Drawing with aquarels made me realise that I like using colours in my art. I prefer acrylics, but watercolours are to this day one of the best and easiest ways to make still life works besides pencil. I have series of similar drawings but I don\'t have images of them and I don\'t like them that much',
                'liked' => 1,
            ],
            [
                'title' => 'One Rode To Asa Bay',
                'genre' => 'Nature, Fantasy, Digital, Realism',
                'image' => '1763996241_digital2.jpg',
                'description' => null,
                'artist' => 'Diana Kovika',
                'year' => '2023-07-13',
                'price' => '777',
                'commentsA' => 'Tries some digital work, was listening to Bathory. Not much practice in this type of art yet, hopefully soon I will improve my skills after buying ipad for digital stuff :D',
                'liked' => 1,
            ],
            [
                'title' => 'Transfiguration',
                'genre' => 'Sculpture, Anatomy, Realism',
                'image' => '1763997250_1760820481_transfiguration.jpg',
                'description' => null,
                'artist' => 'Emil Melmoth',
                'year' => '2024-07-12',
                'price' => '10000000',
                'commentsA' => 'Epoxy clay & varnished wood unique one of a kind peace',
                'liked' => 1,
            ],
            [
                'title' => 'Mother Of Those Who Never Came Back',
                'genre' => 'Sculpture, Realism, Horror',
                'image' => '1763997356_1760820615_mother.jpg',
                'description' => null,
                'artist' => 'Emil Melmoth',
                'year' => '2022-07-06',
                'price' => '1500000',
                'commentsA' => 'Epoxy clay, metal and varnished wood',
                'liked' => 0,
            ],
            [
                'title' => 'Pinhead!',
                'genre' => 'Movie, Portrait, Horror',
                'image' => '1763997599_pinhead.JPG',
                'description' => null,
                'artist' => 'Diana Kovika',
                'year' => '2021-07-07',
                'price' => '1111111111111',
                'commentsA' => 'Found this picture in my gallery. My room, Pinhead from Hellraiser portrait drawing and my guitars that I haven\'t seen in years',
                'liked' => 1,
            ],
            [
                'title' => 'Angel Tears',
                'genre' => 'Fantasy',
                'image' => '1763998874_IMG_2919.jpg',
                'description' => null,
                'artist' => 'Diana Kovika',
                'year' => '2025-08-13',
                'price' => '10000000',
                'commentsA' => 'Acrylics, canvas 50X60cm Not sure if I like it bc it\'s not finished yet, but fine enough to upload it here for my DB. I still need to get it done. Inspired by a band Black Sabbath',
                'liked' => 1,
            ],
            [
                'title' => 'The Wild Hunt Of Odin',
                'genre' => 'folklore and mythological painting, romanticism',
                'image' => '1763998447_wilddd.jpg',
                'description' => null,
                'artist' => 'Peter Nicolai Arbo',
                'year' => '1872-05-02',
                'price' => '999999999999999',
                'commentsA' => 'The Wild Hunt of Odin... (long description from DB)',
                'liked' => 1,
            ],
            [
                'title' => 'darius',
                'genre' => 'darius',
                'image' => '1763998280_IMG_2069.JPG',
                'description' => null,
                'artist' => 'darius',
                'year' => '2025-06-06',
                'price' => '999999999',
                'commentsA' => 'darius',
                'liked' => 0,
            ],
            [
                'title' => 'Eclipse',
                'genre' => 'Surrealism, Nature, Fantasy',
                'image' => '1763998393_eclipse.jpg',
                'description' => null,
                'artist' => 'Diana Kovika',
                'year' => '2025-10-18',
                'price' => '10000000',
                'commentsA' => 'My recent work, acrylic, canvas',
                'liked' => 1,
            ],
            [
                'title' => 'One More Painting',
                'genre' => 'Drawing, still life, portrait',
                'image' => '1763999020_IMG_3822.JPG',
                'description' => null,
                'artist' => 'Diana Kovika',
                'year' => '2021-01-01',
                'price' => '10000000',
                'commentsA' => 'One of my practicing works',
                'liked' => 0,
            ],
        ];

        // Insert artworks
        foreach ($artworks as $artworkData) {
            Artwork::create($artworkData);
        }
    }
}
