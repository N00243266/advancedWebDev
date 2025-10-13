<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use Illuminate\Http\Request; 

class ArtworkController extends Controller
{
   
    public function index()
    {
        $artworks = Artwork::all();
        // $artworks = \App\Models\Artwork::all();
        return view('artworks.index', compact('artworks'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('artworkscreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'title' => 'required|string|max:255',
        'genre' => 'required|string|max:255',
        'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        'year' => 'required|date',
        'artist' => 'required|string|max:255',
        'price' => 'required|numeric',
        'comments' => 'nullable|string',
    ]);

    // Store image in public/images
    if ($request->hasFile('image')) {
        $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('images'), $imageName);
    }

    // Save artwork
    Artwork::create([
        'title' => $request->title,
        'genre' => $request->genre,
        'image' => $imageName ?? null,
        'year' => $request->year,
        'artist' => $request->artist,
        'price' => $request->price,
        'comments' => $request->comments ?? null,
    ]);
        return redirect()->route('artworks.index')->with('success', 'Artwork created!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Artwork $artwork)
    {
        // return view('artworks.show')->with('artwork', $artwork);
        return view('artworks.show', compact('artwork'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artwork $artwork)
    {
        
        return view('artworks.edit', compact('artwork'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artwork $artwork)
    {
        $request->validate([
        'title' => 'required|string|max:255',
        'genre' => 'required|string|max:255',
        'year' => 'required|date',
        'artist' => 'required|string|max:255',
        'price' => 'required|numeric',
        'comments' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('images'), $imageName);
        $artwork->image = $imageName;
    }

    $artwork->update($request->only(['title', 'genre', 'year', 'artist', 'price', 'comments']));

    return redirect()->route('artworks.index')->with('success', 'Artwork updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artwork $artwork)
    {
    if ($artwork->image && file_exists(public_path('images/' . $artwork->image))) {
        unlink(public_path('images/' . $artwork->image));
    }
    $artwork->delete();

    return redirect()->route('artworks.index')->with('success', 'Artwork deleted successfully!');
    }
}
