@props(['categories'])

<x-form.input-wrapper>

    <label for="category_id" class="form-label">Choose Category</label>

    <select class="form-select" id="category_id" name="category_id">
        @foreach ($categories as $category)
            <option {{ $category->id == old('category_id') ? 'selected' : '' }} value="{{ $category->id }}">
                {{ $category->name }}
            </option>
        @endforeach
    </select>

    <x-error name="category_id" />

</x-form.input-wrapper>
