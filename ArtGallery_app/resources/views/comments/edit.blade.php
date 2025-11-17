<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Comment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">Edit Your Comment</h3>

               <x-comment-form
                   :action=" route('comments.update', $comment->id) "
                   method="PUT"
                   :comment="$comment"    
               />
               <form action="{{ route('comments.destroy', $comment) }}" method="POST">
                @csrf
               @method('DELETE')

                <button type="submit" class="text-red-500">Delete</button>
                </form>


                
            </div>
        </div>
    </div>
</x-app-layout>