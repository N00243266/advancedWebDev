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
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>