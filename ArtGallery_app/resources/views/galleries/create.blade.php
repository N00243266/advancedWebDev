<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Gallery') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow-sm">

                <form method="POST" action="{{ route('galleries.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label class="text-gray-900 block font-semibold mb-1">Gallery Name</label>
                        <input type="text" name="name" class="w-full border rounded p-2 text-gray-900" required>
                    </div>

                    <div class="mb-4">
                        <label class="text-gray-900 block font-semibold mb-1">Location</label>
                        <input type="text" name="location" class="w-full border rounded p-2 text-gray-900" required>
                    </div>

                    <!-- <div class="mb-4">
                        <label class="text-gray-900 block font-semibold mb-1">Image Path (optional)</label>
                        <input type="text" name="image" class="w-full border rounded p-2">
                    </div> -->

                     <!-- Image -->
                    <div>
                    <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                    <input
                      type="file"
                    name="image"
                           id="image"
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm "
                           {{ isset($artwork) ? '' : 'required' }}
                      />
                      @isset($artwork->image)
                     <div class="mt-2">
                     <img src="{{ asset('images/' . $artwork->image) }}" alt="{{ $artwork->title }}" class="w-32 h-40 object-cover rounded">
                    </div>
                     @endisset
                     </div>


                    <div class="mb-4">
                        <label class="text-gray-900 block font-semibold mb-1">Description</label>
                        <textarea name="description" class="w-full border rounded p-2 text-gray-900"></textarea>
                    </div>

                    <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Create Gallery
                    </button>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>
