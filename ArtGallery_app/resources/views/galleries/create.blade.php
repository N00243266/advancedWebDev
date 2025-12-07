<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Gallery') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow-sm">

                <form method="POST" action="{{ route('galleries.store') }}" enctype="multipart/form-data">
                    @csrf
                    <!-- <input type="file" name="image" required> -->
                       <!-- Submit button -->

                    <!-- NAME -->
                    <div class="mb-4">
                        <label class="text-gray-900 block font-semibold mb-1">Gallery Name</label>
                        <input type="text" name="name" class="w-full border rounded p-2 text-gray-900" required>
                    </div>

                    <!-- LOCATION -->
                    <div class="mb-4">
                        <label class="text-gray-900 block font-semibold mb-1">Location</label>
                        <input type="text" name="location" class="w-full border rounded p-2 text-gray-900" required>
                    </div>

                     <!-- IMAGE -->
                    <div>
                    <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                    <input
                      type="file"
                    name="image"
                           id="image"
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm "
                           {{ isset($gallery) ? '' : 'required' }}
                           
                      />
                      @isset($gallery->image)
                     <div class="mt-2">
                     <img src="{{ asset('images/' . $gallery->image) }}" alt="{{ $gallery->name }}" class="w-32 h-40 object-cover rounded">
                    </div>
                     @endisset
                     </div>

                          <!-- IMAGE -->
                    <!-- <div class="mb-4">
                        <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                        <input
                            type="file"
                            name="image"
                            id="image"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                        />
                        @error('image')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
 -->

                     




                    <!-- DESCRIPTION -->
                    <div class="mb-4">
                        <label class="text-gray-900 block font-semibold mb-1">Description</label>
                        <textarea name="description" class="w-full border rounded p-2 text-gray-900"></textarea>
                    </div>





                     <!-- ARTWORK SELECTOR -->
                    <div class="mb-6">
                        <label class="text-gray-900 block font-semibold mb-2">Select Artworks to Assign</label>

                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">

                            @foreach($artworks as $artwork)
                                <label class="flex items-center space-x-3 border p-3 rounded-lg shadow-sm hover:bg-gray-50">
                                    <input type="checkbox" name="artworks[]" value="{{ $artwork->id }}" class="h-4 w-4">

                                    <div>
                                        <p class="text-gray-900 font-medium">{{ $artwork->title }}</p>
                                        <p class="text-gray-500 text-sm">{{ $artwork->artist }}</p>
                                    </div>
                                </label>
                            @endforeach

                        </div>
                    </div>





                    <!-- SUBMIT BUTTON -->
                    <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Create Gallery
                    </button>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>
