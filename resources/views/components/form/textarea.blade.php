@props(['name'])

<x-form.input-wrapper>

    <x-form.label :name="$name" />

    <textarea rows="7" class="form-control @error($name)
        is-invalid
    @enderror" name="{{ $name }}"
        id="{{ $name }}">{{ old($name) }}</textarea>

    <x-error :name="$name" />

</x-form.input-wrapper>
