@props(['action', 'method', 'comment'])

<form action="{{ $action }}" method="POST">
    @csrf
    @if(in_array($method, ['PUT','PATCH']))
        @method($method)
    @endif

    <div class="mb-4">
        <label class="block text-sm font-medium">Rating (1-5)</label>
        <input type="number"
            name="rating"
            min="1" max="5"
            value="{{ old('rating', $comment->rating ?? '') }}"
            class="mt-1 block w-full border rounded"
            required>
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium">Comment</label>
        <textarea name="content"
                  rows="3"
                  class="mt-1 block w-full border rounded"
                  required>{{ old('content', $comment->content ?? '') }}</textarea>
    </div>

    <x-primary-button>
        {{ $comment ? 'Update Comment' : 'Submit Comment' }}
    </x-primary-button>
</form>
