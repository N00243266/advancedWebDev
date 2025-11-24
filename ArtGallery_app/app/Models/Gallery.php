<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [            // mass assignable attributes
        'name',
        'location',
        'image',
        'description',
    ];

    public function artworks()        // relationship with artworks
    {
        return $this->belongsToMany(Artwork::class);
    }
}
