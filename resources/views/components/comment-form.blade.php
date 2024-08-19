@props(['blog'])

<x-card-wrapper>

    <form action="{{ route('comments.store', $blog) }}" method="POST" autocomplete="off">
        @csrf
        <div class="mb-3">
            <textarea class="border-0 form-control" name="body" id="body" rows="5" placeholder="Say something..." required>{{ old('body') }}</textarea>
        </div>
        <x-error name="body" />
        <div class="d-flex justify-content-end">
            <button type="submit" class="rounded btn btn-primary">
                Submit
            </button>
        </div>
    </form>

</x-card-wrapper>
