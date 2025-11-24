<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Galleries') }}
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
                    <h3 class="font-semibold text-lg mb-4">List of all Galleries:</h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($galleries as $gallery)
                            <div class="border p-4 rounded-lg shadow-md">

                                <a href="{{ route('galleries.show', $gallery->id) }}">
                                    <h3 class="text-xl font-semibold mb-2">{{ $gallery->name }}</h3>
                                    <p class="text-gray-600">{{ $gallery->location }}</p>

                                    @if($gallery->image)
                                        <img src="{{ asset($gallery->image) }}" class="mt-3 rounded-lg w-full h-48 object-cover">
                                    @endif
                                </a>

                                <!-- Buttons -->
                                <div class="flex justify-between items-center mt-4">

                                    <!-- Edit -->
                                    <a href="{{ route('galleries.edit', $gallery->id) }}"
                                       class="rounded-md hover:bg-gray-100 px-4 py-2 text-black">
                                        Edit
                                    </a>

                                    <!-- Delete -->
                                    <form action="{{ route('galleries.destroy', $gallery->id) }}" method="POST"
                                          onsubmit="return confirm('Delete this gallery?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                                            Delete
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
