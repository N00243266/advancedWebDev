@props(['title', 'image', 'genre', 'year', 'artist', 'price', 'comments'])

<div class="border rounded-lg shadow-md bg-white hover:shadow-lg transition duration-300 ">

    <!-- Title -->
    <h4 class="font-bold text-lg mb-1 px-4 pt-4">{{ $title }}</h4>

    <!-- Genre -->
    <p class="text-sm text-gray-500 mb-2 px-4">{{ $genre }}</p>

    <!-- Image -->
     <div class="overflow-hidden flex px-4 justify-center">
    <img src="{{ asset('images/' . $image) }}" alt="{{ $title }}" class="w-full max-w-xs h-auto object-cover rounded-lg">
    </div>
  

    <!-- Content below image -->
    <div class="p-4 flex-1 flex flex-col justify-between">
        <div>
            <p class="text-sm text-gray-500 mb-1">Year: {{ $year }}</p>
            <p class="text-sm text-gray-600 mb-1">Artist: {{ $artist }}</p>
        </div>
        <div class="mt-auto">
            <p class="font-semibold text-gray-800">Price: ${{ $price }}</p>
            <p class="text-sm text-gray-500">{{ $comments }} </p>
        </div>
    </div>
    


    

</div>
