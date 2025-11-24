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
          return view('galleries.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('galleries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'image' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        Gallery::create($validated);

        return redirect()->route('galleries.index')->with('success', 'Gallery created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        // Load artworks for this gallery
        $gallery->load('artworks');
        return view('galleries.show', compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
          return view('galleries.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
         $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'image' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $gallery->update($validated);

        return redirect()->route('galleries.index')->with('success', 'Gallery updated successfully');
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
