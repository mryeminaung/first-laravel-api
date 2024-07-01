@props(['comment'])

<x-card-wrapper>
    <div class="d-flex items-center">
        <div>
            <img src="{{ $comment->author->avatar }}" class="rounded-circle" width="50" height="50" alt="">
        </div>
        <div class="ms-3">
            <h6>
                <a class="text-decoration-none text-black" href="/user/{{ $comment->author->username }}">
                    {{ $comment->author->name }}
                </a>
            </h6>

            {{-- <p class="text-secondary">{{ $comment->created_at->diffForHumans() }}</p> --}}

            {{-- 
                more data format can be studied on 
                https://www.php.net/manual/en/function.date.php 
            --}}
            <p class="text-secondary">
                {{ $comment->created_at->format('F j, Y, g:i a') }}
            </p>
        </div>
    </div>
    <p class="mt-1">
        {{ $comment->body }}
    </p>
</x-card-wrapper>
