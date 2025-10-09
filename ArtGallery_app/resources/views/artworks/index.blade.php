
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
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        @foreach($artworks as $artwork)
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
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>