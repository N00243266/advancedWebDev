<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text_gray-800 leading-tight">       <!-- header for edit artwork page -->
            {{ __('Edit Artwork') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">Edit Artwork</h3>          <!-- subtitle for edit artwork page -->

                    <x-artwork-form
                     :action=" route('artworks.update', $artwork) "             
                     method="PUT"
                     :artwork="$artwork"
                    >
                    </x-artwork-form>

                </div>
            </div>
        </div>
    </div>



</x-app-layout>