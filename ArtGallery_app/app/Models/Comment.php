<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

      protected $fillable = [            // mass assignable attributes
            'artwork_id',
            'user_id',
            'content',
            'rating',
     ];


   public function artwork()
   {
       return $this->belongsTo(Artwork::class);   // Relationship: Comment belongs to an Artwork
   }
   public function user()
   {
       return $this->belongsTo(User::class);   // Relationship: Comment belongs to a User
   }
}
