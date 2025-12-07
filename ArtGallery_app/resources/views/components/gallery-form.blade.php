@php
print_r($errors->all());
@endphp

form method="POST" action="{{ $action }}" enctype="multipart/form-data">
    @csrf
    @if($method === 'PUT')
        @method('PUT')
    @endif

    <div class="mb-4">
        <label class="block font-semibold mb-1">Gallery Name</label>
        <input type="text" name="name" class="w-full border p-2 rounded"
               value="{{ old('name', $gallery->name ?? '') }}" required>
               @error('name')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label class="block font-semibold mb-1">Location</label>
        <input type="text" name="location" class="w-full border p-2 rounded"
               value="{{ old('location', $gallery->location ?? '') }}" required>
               @error('location')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label class="block font-semibold mb-1">Image</label>

        <!-- Show current image if editing -->
        @if(!empty($gallery?->image))
            <div class="mb-2">
                <img src="{{ asset('storage/' . $gallery->image) }}" 
                     alt="Gallery Image" 
                     class="w-48 h-auto rounded border">
                     @error('image')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
            </div>
        @endif

        <!-- Image upload input -->
        <input type="file" name="image" class="w-full border p-2 rounded" accept="image/*">
    </div>

    <div class="mb-4">
        <label class="block font-semibold mb-1">Description</label>
        <textarea name="description" class="w-full border p-2 rounded">{{ old('description', $gallery->description ?? '') }}</textarea>
    </div>

    <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        {{ $buttonText }}
    </button>
</form>
