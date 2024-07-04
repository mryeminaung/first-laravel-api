<div {{ $attributes->merge(['class' => 'p-4']) }} role="alert">
    <p>{{ $message }}</p>
    <p><strong>{{ $title }}</strong></p>
    
    <p>
        @if ($slot->isEmpty())
            This is default content if the slot is empty.
        @else
            {{ $slot }}
        @endif
    </p>
</div>
