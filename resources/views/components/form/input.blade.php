@props(['name', 'type' => 'text'])

<x-form.input-wrapper>

    <x-form.label :name="$name" />

    <input type="{{ $type }}" value="{{ old($name) }}" name="{{ $name }}"
        class="form-control @error($name)
        is-invalid
    @enderror" id="{{ $name }}">
    
    <x-error :name="$name" />

</x-form.input-wrapper>
