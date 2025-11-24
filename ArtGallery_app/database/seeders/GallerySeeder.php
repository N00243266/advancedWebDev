<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Gallery;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    Gallery::insert([
        [
            'name' => 'Gormley’s Art Gallery',
            'location' => 'Dublin, Ireland',
            'image' => 'gormleys_art_gallery.jpg',
            'description' => 'A contemporary gallery showcasing Irish and international artists.',
        ],
        [
            'name' => 'The Lab',
            'location' => 'Dublin, Ireland',
            'image' => 'the_lab_gallery.jpg',
            'description' => 'An innovative arts space supporting emerging artists and experimental work.',
        ],
        [
            'name' => 'Sol Art Gallery',
            'location' => 'Dublin, Ireland',
            'image' => 'sol_art_gallery.jpg',
            'description' => 'A vibrant gallery featuring modern Irish art and eclectic exhibitions.',
        ],
        [
            'name' => 'Kerin Gallery',
            'location' => 'Dublin, Ireland',
            'image' => 'kerin_gallery.jpg',
            'description' => 'Specializing in contemporary Irish artwork with rotating exhibitions.',
        ],
        [
            'name' => 'The Douglas Hyde Gallery',
            'location' => 'Dublin, Ireland',
            'image' => 'douglas_hyde_gallery.jpg',
            'description' => 'A renowned contemporary art institution located at Trinity College Dublin.',
        ],
        [
            'name' => 'Royal Hibernian Academy of Arts',
            'location' => 'Dublin, Ireland',
            'image' => 'royal_hibernian_academy.jpg',
            'description' => 'One of Ireland’s leading art institutions showcasing dynamic exhibitions and Irish artists.',
        ],
    ]);
}

}
