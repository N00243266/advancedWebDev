<x-artwork-form :action="route('artworks.store')" method="POST">

    <!-- Title -->
    <div class="mb-4">
        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
        <input type="text" name="title" id="title"
               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
    </div>

    <!-- Genre -->
    <div class="mb-4">
        <label for="genre" class="block text-sm font-medium text-gray-700">Genre</label>
        <input type="text" name="genre" id="genre"
               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
    </div>

    <!-- Image -->
    <div class="mb-4">
        <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
        <input type="file" name="image" id="image"
               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
    </div>

    <!-- Year -->
    <div class="mb-4">
        <label for="year" class="block text-sm font-medium text-gray-700">Year</label>
        <input type="date" name="year" id="year"
               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
    </div>

    <!-- Artist -->
    <div class="mb-4">
        <label for="artist" class="block text-sm font-medium text-gray-700">Artist</label>
        <input type="text" name="artist" id="artist"
               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
    </div>

    <!-- Price -->
    <div class="mb-4">
        <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
        <input type="text" name="price" id="price"
               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
    </div>

    <!-- Comments -->
    <div class="mb-4">
        <label for="comments" class="block text-sm font-medium text-gray-700">Comments</label>
        <textarea name="comments" id="comments" rows="4"
                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
    </div>

    <!-- Submit Button -->
    <div>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
            Create Artwork
        </button>
    </div>

</x-artwork-form>
