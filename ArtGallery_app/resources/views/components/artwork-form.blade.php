@props(['action', 'method' => 'POST', 'artwork' => null])

<form action="{{ $action }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf
    @if(in_array($method, ['PUT', 'PATCH']))
        @method($method)
    @endif

    <!-- Title -->
    <div>
        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
        <input
            type="text"
            name="title"
            id="title"
            value="{{ old('title', $artwork->title ?? '') }}"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
            required
        />
        @error('title')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Genre -->
    <div>
        <label for="genre" class="block text-sm font-medium text-gray-700">Genre</label>
        <input
            type="text"
            name="genre"
            id="genre"
            value="{{ old('genre', $artwork->genre ?? '') }}"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
            required
        />
        @error('genre')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Image -->
    <div>
        <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
        <input
            type="file"
            name="image"
            id="image"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
            {{ isset($artwork) ? '' : 'required' }}
        />
        @isset($artwork->image)
            <div class="mt-2">
                <img src="{{ asset('images/' . $artwork->image) }}" alt="{{ $artwork->title }}" class="w-32 h-40 object-cover rounded">
            </div>
        @endisset
    </div>

    <!-- Year -->
    <div>
        <label for="year" class="block text-sm font-medium text-gray-700">Year</label>
        <input
            type="date"
            name="year"
            id="year"
            value="{{ old('year', $artwork->year ?? '') }}"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
            required
        />
    </div>

    <!-- Artist -->
    <div>
        <label for="artist" class="block text-sm font-medium text-gray-700">Artist</label>
        <input
            type="text"
            name="artist"
            id="artist"
            value="{{ old('artist', $artwork->artist ?? '') }}"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
            required
        />
    </div>

    <!-- Price -->
    <div>
        <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
        <input
            type="number"
            step="0.01"
            name="price"
            id="price"
            value="{{ old('price', $artwork->price ?? '') }}"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
            required
        />
    </div>

    <!-- Comments -->
    <div>
        <label for="comments" class="block text-sm font-medium text-gray-700">Comments</label>
        <textarea
            name="comments"
            id="comments"
            rows="4"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
        >{{ old('comments', $artwork->comments ?? '') }}</textarea>
    </div>

    <!-- Submit Button -->
    <div>
        <x-primary-button>
            {{ isset($artwork) ? 'Update Artwork' : 'Create Artwork' }}
        </x-primary-button>
    </div>
</form>


     <!-- Slot for form fields -->
    {{ $slot }}
</form>
 