<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Artwork') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">Create a New Artwork</h3>

                    <x-artwork-form action="{{ route('artworks.store') }}" method="POST">
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

                        <!-- Description -->
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <input type="text" name="description" id="description" rows="4"
                                      class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>

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
                            <input type="text" name="comments" id="comments" rows="4"
                                      class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>

                        <!-- Submit Button -->
                        <div>
                            <!-- <button type="submit">Submit</button> -->
                             <div class="flex justify-center">
                                  <button type="submit">Submit❤️</button>
                              </div>

                        </div>
                    </x-artwork-form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
