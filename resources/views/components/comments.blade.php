@props(['blog'])

<section class="container">
    <div class="col-md-8 mx-auto">
        <h5 class="my-3 text-secondary">
            Comments ({{ $blog->comments->count() }})
        </h5>

        {{-- single comment card --}}
        @foreach ($blog->comments as $comment)
            <x-single-comment :comment="$comment" />
        @endforeach

    </div>
</section>
