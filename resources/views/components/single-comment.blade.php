@props(['comment'])

<section>
    <div class="border p-3 my-4 rounded">
        <div class="d-flex items-center">
            <div>
                <img src="https://i.pravatar.cc/300" class="rounded-circle" width="50" height="50" alt="">
            </div>
            <div class="ms-3">
                <h6>
                    <a class="text-decoration-none text-black" href="/user/{{ $comment->author->username }}">
                        {{ $comment->author->name }}
                    </a>
                </h6>
                <p class="text-secondary">{{ $comment->created_at->diffForHumans() }}</p>
            </div>
        </div>
        <p class="mt-1">
            {{ $comment->body }}
        </p>
    </div>
</section>
