@props(['title', 'image', 'genre', 'year', 'artist', 'price', 'comments'])

<div class="border rounded-lg shadow-md bg-white text-gray-900 
            transition-transform duration-300 ease-in-out 
            hover:scale-105 hover:shadow-2xl">

    <!-- Title -->
    <h4 class="font-bold text-lg mb-1 px-4 pt-4">{{ $title }}</h4>

    <!-- Genre -->
    <p class="text-sm text-gray-400 mb-2 px-4">{{ $genre }}</p>

    <!-- Image -->
    <div class="overflow-hidden flex px-4 justify-center rounded-lg">
        <img src="{{ asset('images/' . $image) }}" 
             alt="{{ $title }}" 
             class="w-full max-w-xs h-auto object-cover rounded-lg 
                    transition-transform duration-500 ease-in-out hover:scale-110">
    </div>

    <!-- Content below image -->
    <div class="p-4 flex-1 flex flex-col justify-between">
        <div>
            <p class="text-sm text-gray-400 mb-1">Year: {{ $year }}</p>
            <p class="text-sm text-gray-900 mb-1">Artist: {{ $artist }}</p>
        </div>
        <div class="mt-auto">
            <p class="font-semibold text-white">Price: ${{ $price }}</p>
            <p class="text-sm text-gray-900">{{ $comments }}</p>
        </div>
    </div>

</div>
