<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Artwork;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Artwork $artwork)
    {  
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'content' => 'nullable|string|max:1000',
            
        ]);

       $artwork->comments()->create([
            'user_id' => auth()->id(),
            'rating' => $request->input('rating'),
            'content' => $request->input('content'),
            'artwork_id' => $artwork->id,
       ]);

       return redirect()->route('artworks.show', $artwork)->with('success', 'Comment added successfully.');

        
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
