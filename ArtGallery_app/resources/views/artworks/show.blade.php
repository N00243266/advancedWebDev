<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Artwork Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">{{ $artwork->title }}</h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <!-- Image -->
                        <div>
                            <img src="{{ asset('images/' . $artwork->image) }}" alt="{{ $artwork->title }}" class="w-full h-auto object-cover rounded-lg">
                        </div>

                        <!-- Details -->
                        <div>
                            <p><strong>Genre:</strong> {{ $artwork->genre }}</p>
                            <p><strong>Year:</strong> {{ $artwork->year }}</p>
                            <p><strong>Artist:</strong> {{ $artwork->artist }}</p>
                            <p><strong>Price:</strong> ${{ $artwork->price }}</p>
                            <p><strong>Comments:</strong> {{ $artwork->comments }}</p>
                        </div>

                        <form action="{{ route('artworks.toggleLike', $artwork->id) }}" method="POST" class="mt-2">
                            @csrf
                            <button type="submit" class="focus:outline-none">
                                @if($artwork->liked)
                                    <!-- filled red heart -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="red" viewBox="0 0 24 24" class="w-6 h-6">
                                        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5
                                                 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09
                                                 C13.09 3.81 14.76 3 16.5 3
                                                 19.58 3 22 5.42 22 8.5
                                                 c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                    </svg>
                                @else
                                    <!-- empty heart -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="red" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M4.318 6.318a4.5 4.5 0 016.364 0L12 7.636
                                                   l1.318-1.318a4.5 4.5 0 116.364 6.364L12 21.364
                                                   4.318 12.682a4.5 4.5 0 010-6.364z" />
                                    </svg>
                                @endif
                            </button>
                        </form>

                            <!-- Edit Button -->
                            <div class="flex justify-between">
                                <a href="{{ route('artworks.edit', $artwork->id) }}" class="mt-4 px-4 py-2 text-black rounded-md ">
                                    Edit 
                                </a>


                         <!-- Delete Button -->
                    <form action="{{ route('artworks.destroy', $artwork->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this artwork?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="mt-4 px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                            Delete Artwork
                        </button>
                    </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>