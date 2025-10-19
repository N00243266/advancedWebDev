<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ❤️ Liked Artworks
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                @if($artworks->isEmpty())
                    <p>No liked artworks yet.</p>
                @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        @foreach($artworks as $artwork)
                            <x-artwork-card 
                                :title="$artwork->title"
                                :genre="$artwork->genre"
                                :image="$artwork->image"
                                :year="$artwork->year"
                                :artist="$artwork->artist"
                                :price="$artwork->price"
                                :comments="$artwork->comments"
                                :liked="$artwork->liked"
                            />
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
