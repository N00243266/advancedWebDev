<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use Illuminate\Http\Request; 
use League\ColorExtractor\Palette;  //for color palette
use League\ColorExtractor\ColorExtractor; //for color extraction

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
       
        return view('artworks.create');

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
       $topColors = [];

try {
    $imagePath = public_path('images/' . $artwork->image);

    if (file_exists($imagePath)) {
        $palette = Palette::fromFilename($imagePath);
        $extractor = new ColorExtractor($palette);
        $colors = $extractor->extract(10);

        foreach ($colors as $color) {
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


    return view('artworks.show', compact('artwork', 'topColors'));
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



    // Like system methods

    public function toggleLike(Artwork $artwork)
{
    $artwork->liked = !$artwork->liked; // flip the value
    $artwork->save();

    return back();
}

    public function liked()
{
    $artworks = Artwork::where('liked', true)->get();
    return view('artworks.liked', compact('artworks'));
}




}
