
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Artworks') }}
        </h2>
        @if(session('success'))
            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>
        @endif
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">List of all Artworks:</h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($artworks as $artwork)
                        <div class="border p-4 rounded-lg shadow-md">
                        <a href="{{ route('artworks.show', $artwork) }}"> 
                            <x-artwork-card 
                                :title="$artwork->title"
                                :genre="$artwork->genre"
                                :image="$artwork->image"
                                :year="$artwork->year"
                                :artist="$artwork->artist"
                                :price="$artwork->price"
                                :comments="$artwork->comments"
                                
                            />

                        </a>
                                 <!-- Edit Button -->
                          <div class="mt-flex space-x-2">
                        <a href="{{ route('artworks.edit', $artwork) }}" class="bg-orange-500 rounded-md hover:bg-orange-700">
                            Edit
                        </a>
                   
                        

                              <!-- Delete Button -->
                    <form action="{{ route('artworks.destroy', $artwork->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this artwork?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="mt-4 px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 mb-6">
                            Delete Artwork
                        </button>
                    </form>
                        
                     </div>
                    </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>