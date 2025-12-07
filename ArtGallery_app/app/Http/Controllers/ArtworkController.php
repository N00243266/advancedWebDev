<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use App\Models\Gallery;
use Illuminate\Http\Request; 
use League\ColorExtractor\Palette;  //for color palette
use League\ColorExtractor\ColorExtractor; //for color extraction

class ArtworkController extends Controller
{
   
    public function index()
    {
        
        $artworks = Artwork::all();         // fetch all artworks
        return view('artworks.index', compact('artworks'));  // pass artworks to view
        
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        if (auth()->user()->role !== 'admin') {
            return redirect()->route('artworks.index')->with('error', 'Access denied.');
        }
       
        $galleries = Gallery::all();

        return view('artworks.create', compact('galleries'));     // pass galleries to view

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)      // store new artwork
    {
        //    dd($request);
        $request->validate([
        'title' => 'required|string|max:255',
        'genre' => 'required|string|max:255',
        'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        'year' => 'required|date',
        'artist' => 'required|string|max:255',
        'price' => 'required|numeric',
        'commentsA' => 'nullable|string',
        'galleries' => 'nullable|array',
        'galleries.*' => 'integer|exists:galleries,id'
    ]);

    // Store image in public/images
    if ($request->hasFile('image')) {
        $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('images'), $imageName);
    }

    // Save artwork
    // Artwork::create([  
    $artwork = Artwork::create([               
        'title' => $request->title,
        'genre' => $request->genre,
        'image' => $imageName ?? null,
        'year' => $request->year,
        'artist' => $request->artist,
        'price' => $request->price,
        'commentsA' => $request->commentsA ?? null,
    ]);


           //  ATTACH SELECTED GALLERIES
    if ($request->has('galleries')) {
        $artwork->galleries()->attach($request->galleries);
    }


        return redirect()->route('artworks.index')->with('success', 'Artwork created!');      /// redirect to index with success message

    }

    /**
     * Display the specified resource.
     */
    public function show(Artwork $artwork)
    {
       $artwork = Artwork::with('comments.user')->findOrFail($artwork->id);
       
       $topColors = [];

try {
    $imagePath = public_path('images/' . $artwork->image); // Adjust path as needed

    if (file_exists($imagePath)) {
        $palette = Palette::fromFilename($imagePath);       // create palette
        $extractor = new ColorExtractor($palette);
        $colors = $extractor->extract(10);

        foreach ($colors as $color) { // filter colors
            [$r, $g, $b] = [
                ($color >> 16) & 0xFF,
                ($color >> 8) & 0xFF,
                $color & 0xFF,
            ];

            $brightness = ($r * 0.299 + $g * 0.587 + $b * 0.114);
            if ($brightness < 25 || $brightness > 245) continue; // adjusted brightness filter

            $max = max($r, $g, $b);
            $min = min($r, $g, $b);
            $saturation = ($max - $min) / max($max, 1);
            if ($saturation < 0.15) continue; // adjusted saturation filter

            $topColors[] = $color;
            if (count($topColors) >= 5) break; // stop when we have 5 good colors
        }

        //  fallback AFTER the loop to ensure we have 5 colors
        if (count($topColors) < 5) {
            $remaining = array_diff($colors, $topColors);
            $topColors = array_merge($topColors, array_slice($remaining, 0, 5 - count($topColors)));
        }
    }
} catch (\Exception $e) {
    // silently ignore errors
}
      $galleries = $artwork->galleries;
   
    return view('artworks.show', [
        'artwork'   => $artwork,
        'topColors' => $topColors,
         'comments' => $artwork->comments,
         'galleries' => $galleries,
    ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artwork $artwork)
    {


        // Load all galleries for the multi-select
        $galleries = Gallery::all();

        // Load IDs of galleries already assigned to this artwork
        $selectedGalleries = $artwork->galleries()->pluck('galleries.id')->toArray();

        return view('artworks.edit', [
             'artwork' => $artwork,
             'galleries' => $galleries,
             'selectedGalleries' => $selectedGalleries
        ]);
 }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artwork $artwork)
    {
        $request->validate([       // validate input
        'title' => 'required|string|max:255',
        'genre' => 'required|string|max:255',
        'year' => 'required|date',
        'artist' => 'required|string|max:255',
        'price' => 'required|numeric',
        'commentsA' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        'galleries' => 'nullable|array',
        'galleries.*' => 'integer|exists:galleries,id'
    ]);

    if ($request->hasFile('image')) {
        $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('images'), $imageName);
        $artwork->image = $imageName;
    }

    $artwork->update($request->only(['title', 'genre', 'year', 'artist', 'price', 'commentsA']));


    // SYNC SELECTED GALLERIES
    $artwork->galleries()->sync($request->galleries ?? []);


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



    // Like system methods

    public function toggleLike(Artwork $artwork) //like/unlike
{
    $artwork->liked = !$artwork->liked; // flip the value
    $artwork->save();        // save change

    return back();         // return to previous page
}

    public function liked()      //view liked artworks
{
    $artworks = Artwork::where('liked', true)->get();     // fetch liked artworks
    return view('artworks.liked', compact('artworks'));   // pass to view
}




}
