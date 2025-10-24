<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;         

use Illuminate\Database\Eloquent\Model;        // Eloquent model

class Artwork extends Model         // Artwork model
{
    use HasFactory;

     protected $fillable = [            // mass assignable attributes
         'title',
         'genre',
         'image',
         'description',
         'artist',
         'year',
         'price',
         'comments',
          'liked',
     ];


}
