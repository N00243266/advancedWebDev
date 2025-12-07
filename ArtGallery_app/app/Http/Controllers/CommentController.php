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
            'rating' => 'required|integer|min:1|max:5', // Rating between 1 and 5
            'content' => 'nullable|string|max:1000',        // Optional content
            
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
        if (auth()->user()->id !== $comment->user_id && auth()->user()->role !== 'admin') {           // Access control: only the comment owner or admin can edit
            return redirect()->route('artworks.show', $comment->artwork_id)->with('error', 'Access denied.');
        }
        return view('comments.edit', compact('comment'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
       $request->validate([
        'rating' => 'required|integer|min:1|max:5',
        'content' => 'nullable|string|max:1000',
    ]);

    $comment->rating  = $request->rating;        // Update rating
    $comment->content = $request->content;        // Update content
    
    $comment->save();

    return redirect()
        ->route('artworks.show', $comment->artwork_id)
        ->with('success', 'Comment updated successfully.');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
         if (auth()->id() !== $comment->user_id && auth()->user()->role !== 'admin') {
        return redirect()->back()->with('error', 'Access denied.');
    }

    $artworkId = $comment->artwork_id;

    $comment->delete();

    return redirect()
        ->route('artworks.show', $artworkId)         // Redirect to the artwork page
        ->with('success', 'Comment deleted.');
    }
}
