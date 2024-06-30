@props(['blog'])

<section class="container">
    <div class="col-md-12 col-lg-8 mx-auto">
        <h5 class="my-3 text-secondary">
            Comments ({{ $blog->comments->count() }})
        </h5>

        @if ($blog->comments->count() > 0)
            {{-- single comment card --}}
            @foreach ($blog->comments->sortByDesc('created_at') as $comment)
                <x-single-comment :comment="$comment" />
            @endforeach
        @endif

    </div>
</section>
