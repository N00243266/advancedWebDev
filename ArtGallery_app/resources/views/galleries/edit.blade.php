

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Gallery') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow-sm">

                <form method="POST" action="{{ route('galleries.update', $gallery->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Name -->
                    <div class="mb-4">
                        <label class="text-gray-900 block font-semibold mb-1">Gallery Name</label>
                        <input type="text" name="name" value="{{ $gallery->name }}" class="w-full border rounded p-2 text-gray-900" required>
                    </div>

                    <!-- Location -->
                    <div class="mb-4">
                        <label class="text-gray-900 block font-semibold mb-1">Location</label>
                        <input type="text" name="location" value="{{ $gallery->location }}" class="w-full border rounded p-2 text-gray-900" required>
                    </div>

                    <!-- Image -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Image</label>

                        <input type="file" 
                               name="image" 
                               id="image"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />

                        @if($gallery->image)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $gallery->image) }}" 
                                     alt="{{ $gallery->name }}" 
                                     class="w-32 h-32 object-cover rounded">
                            </div>
                        @endif
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <label class="text-gray-900 block font-semibold mb-1">Description</label>
                        <textarea name="description" class="w-full border rounded p-2 text-gray-900">{{ $gallery->description }}</textarea>
                    </div>

                    <!-- Artworks Multi-Select -->
                    <div class="mb-6">
                        <label class="text-gray-900 block font-semibold mb-2">Assign Artworks</label>

                        <select name="artworks[]" multiple class="text-gray-900 w-full border rounded p-2 h-40">

                            @foreach($artworks as $artwork)
                                <option value="{{ $artwork->id }}"
                                    {{ $gallery->artworks->contains($artwork->id) ? 'selected' : '' }}>
                                    {{ $artwork->title }}
                                </option>
                            @endforeach

                        </select>

                        <p class="text-sm text-gray-600 mt-1">Hold CTRL (Windows) or CMD (Mac) to select multiple.</p>
                    </div>

                    <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Update Gallery
                    </button>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>
