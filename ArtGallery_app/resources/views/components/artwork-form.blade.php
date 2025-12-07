@props(['action', 'method' => 'POST', 'artwork' => null,  'galleries' => [], 'selectedGalleries' => []])

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
        <label for="commentsA" class="block text-sm font-medium text-gray-700">Comments</label>
        <textarea
            name="commentsA"
            id="commentsA"
            rows="4"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
        >{{ old('commentsA', $artwork->commentsA ?? '') }}</textarea>
    </div>



    <!-- Galleries Multi-Select -->
     <div class="mb-4">
    <label class="block text-sm font-medium text-gray-700">Assign to Galleries</label>

    <select name="galleries[]" multiple class="w-full border rounded p-2">
        @foreach($galleries as $gallery)
            <option 
                value="{{ $gallery->id }}"
                @if(in_array($gallery->id, $selectedGalleries)) selected @endif
            >
                {{ $gallery->name }}
            </option>
        @endforeach
    </select>

    <p class="text-sm text-gray-500 mt-1">Hold CTRL (Windows) or CMD (Mac) to select multiple</p>
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
 