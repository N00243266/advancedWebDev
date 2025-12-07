<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $gallery->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-lg p-6">




                {{-- IMAGE --}}
                @if($gallery->image)
                    <img src="{{ asset('images/' . $gallery->image) }}" 
                         alt="{{ $gallery->name }}" 
                         class="rounded-lg w-full max-h-96 object-cover mb-6">
                @else
                    <p class="text-gray-500 italic mb-6">No image available.</p>
                @endif






                <!-- Gallery Details -->
                <h3 class="text-2xl font-bold mb-2">{{ $gallery->name }}</h3>
                <p class="text-gray-600 mb-4">{{ $gallery->location }}</p>
                <p class="text-gray-600 mb-6">{{ $gallery->description }}</p>

                {{-- ARTWORKS COUNT --}}

                <!-- Edit & Delete Buttons -->
                <div class=" text-gray-600 flex gap-4 mb-10">
                    @if(auth()->user()->role === 'admin')
                    <a href="{{ route('galleries.edit', $gallery->id) }}"
                       class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">
                        Edit
                    </a>
                    @endif

                    @if(auth()->user()->role === 'admin')
                    <form action="{{ route('galleries.destroy', $gallery->id) }}" method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this gallery?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                            Delete
                        </button>
                    </form>
                    @endif
                </div>

                <!-- Artworks in this Gallery -->
                <h3 class="text-xl font-semibold mb-4">Artworks in this Gallery</h3>

                @if($gallery->artworks->count() == 0)
                    <p class="text-gray-500">No artworks assigned to this gallery yet.</p>
                @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($gallery->artworks as $artwork)
                            <div class="border p-4 rounded-lg shadow-md">
                                <a href="{{ route('artworks.show', $artwork->id) }}">
                                    <x-artwork-card 
                                        :title="$artwork->title"
                                        :genre="$artwork->genre"
                                        :image="$artwork->image"
                                        :year="$artwork->year"
                                        :artist="$artwork->artist"
                                        :price="$artwork->price"
                                        :commentsA="$artwork->commentsA"
                                        :liked="$artwork->liked"
                                    />
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
