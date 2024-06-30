@props(['blog'])

<x-card-wrapper>

    <form action="/blogs/{{ $blog->slug }}/comments" method="POST" autocomplete="off">
        @csrf
        <div class="mb-3">
            <textarea class="form-control border-0" name="body" id="body" rows="5" placeholder="Say something..." required>{{ old('body') }}</textarea>
        </div>
        <x-error name="body" />
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn rounded btn-primary">
                Submit
            </button>
        </div>
    </form>

</x-card-wrapper>
