<section class="container">
    <div class="col-md-8 mx-auto">
        <h5 class="my-3 text-secondary">Comments (3)</h5>
        
        {{-- single comment card --}}
        @foreach (range(1, 4) as $comment)
            <x-single-comment />
        @endforeach

    </div>
</section>
