<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Gallery;
use App\Models\ArtWork;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.php
     */
    public function run(): void
{
    $galleries = [
        [
            'name' => 'Gormley’s Art Gallery',
            'location' => 'Dublin, Ireland',
            'image' => '1764089094_IMG_3833.jpg',
            'description' => 'A contemporary gallery showcasing Irish and international artists.',
        ],
        [
            'name' => 'The Lab',
            'location' => 'Dublin, Ireland',
            'image' => '1764089302_The-Lab-8073.jpg',
            'description' => 'An innovative arts space supporting emerging artists and experimental work.',
        ],
        [
            'name' => 'Sol Art Gallery',
            'location' => 'Dublin, Ireland',
            'image' => '1764249522_solartt.jpg',
            'description' => 'A vibrant gallery featuring modern Irish art and eclectic exhibitions.',
        ],
        [
            'name' => 'Kerin Gallery',
            'location' => 'Dublin, Ireland',
            'image' => '1764251570_kerin.jpg',
            'description' => 'Specializing in contemporary Irish artwork with rotating exhibitions.',
        ],
        [
            'name' => 'The Douglas Hyde Gallery',
            'location' => 'Dublin, Ireland',
            'image' => '1764252256_hydeg.jpg',
            'description' => 'A renowned contemporary art institution located at Trinity College Dublin.',
        ],
        [
            'name' => 'Royal Hibernian Academy of Arts',
            'location' => 'Dublin, Ireland',
            'image' => '1764252622_royal.jpg',
            'description' => 'One of Ireland’s leading art institutions showcasing dynamic exhibitions and Irish artists.',
        ],
    ];

    foreach ($galleries as $galleryData) {
       $gallery = Gallery::create($galleryData);

       $galleryArtworks = Artwork::inRandomOrder()->take(3)->pluck('id');

       $gallery->artworks()->attach($galleryArtworks);
    }
}

}
