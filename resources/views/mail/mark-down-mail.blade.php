@props(['blog'])

<x-mail::message>
    # {{ $blog->title }}
    <x-mail::panel>
        {{ $blog->body }}
    </x-mail::panel>

    <x-mail::button :url="null" color="success">
        View Comments
    </x-mail::button>
</x-mail::message>
