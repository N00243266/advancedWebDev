<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Artwork;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          $galleries = Gallery::all();
          return view('galleries.index', compact('galleries'));   // pass galleries to view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $artworks = Artwork::all(); // fetch artworks for selection
        return view('galleries.create', compact('artworks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

 
    if ($request->hasFile('image')) {
        $imageName = time() . '_' . $request->file('image')->getClientOriginalName();       // Store image in public/images
        $request->file('image')->move(public_path('images'), $imageName);
        $validated['image'] = $imageName;
        
    }
     
      $gallery = Gallery::create([
          'name' => $request['name'],
          'location' => $request['location'],
          'image' => $imageName,
          'description' => $request['description'],
      ]);

        // Attach artworks to this gallery
    if ($request->has('artworks')) {
        $gallery->artworks()->attach($request->artworks);      // Attach selected artworks
    }

        return redirect()->route('galleries.index')->with('success', 'Gallery created successfully');     // redirect with success message
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        // Load artworks for this gallery
        $gallery->load('artworks');
        return view('galleries.show', compact('gallery'));          // pass gallery to view
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
          $artworks = Artwork::all();  // Load all artworks to choose from
          $selectedArtworks = $gallery->artworks()->pluck('artworks.id')->toArray(); // selected IDs

          return view('galleries.edit', [
           'gallery' => $gallery,
           'artworks' => $artworks,
           'selectedArtworks' => $selectedArtworks      // pass data to view
         ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
         $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'description' => 'nullable|string',                               
        ]);

     
         if ($request->hasFile('image')) {
        $imageName = time() . '_' . $request->file('image')->getClientOriginalName();     
        $request->file('image')->move(public_path('images'), $imageName);
        $gallery->image = $imageName;
    }

    $gallery->update($request->only(['name', 'location', 'description']));     // update gallery details


     // Sync artworks
    if ($request->has('artworks')) {
        $gallery->artworks()->sync($request->artworks);
    } else {
        $gallery->artworks()->sync([]);
    }


    return redirect()->route('galleries.index')->with('success', 'Gallery updated successfully!');




    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
          $gallery->delete();

        return redirect()->route('galleries.index')->with('success', 'Gallery deleted successfully');
    }
}
