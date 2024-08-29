@props(['categories'])

<x-layout>
    <x-slot name="title">
        Create Blog
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="mx-auto col-md-5">
                <h2 class="mt-3 text-center text-primary">Create New Blog</h2>
                <div class="p-4 my-3 shadow-sm card">
                    <form autocomplete="off" method="POST" action="{{ route('blogs.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" value="{{ old('title') }}" name="title"
                                class="form-control @error('title')
                                is-invalid
                            @enderror"
                                required id="title">
                            <x-error name="title" />
                        </div>
                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" name="slug"
                                class="form-control @error('slug')
                                is-invalid
                            @enderror"
                                required value="{{ old('slug') }}" id="slug">
                            <x-error name="slug" />
                        </div>
                        <div class="mb-3">
                            <label for="intro" class="form-label">Intro</label>
                            <input type="text" name="intro"
                                class="form-control @error('intro')
                                is-invalid
                            @enderror"
                                required value="{{ old('intro') }}" id="intro">
                            <x-error name="intro" />
                        </div>
                        <div class="mb-3">
                            <label for="body" class="form-label">Body</label>
                            <textarea
                                class="form-control @error('body')
                                is-invalid
                            @enderror"
                                required name="body" id="body"></textarea>
                            <x-error name="body" />
                        </div>
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Choose Category</label>
                            <select class="form-select" id="category_id" name="category_id">
                                @foreach ($categories as $category)
                                    <option {{ old('category_id') === $category->name ? 'selected' : '' }}
                                        value="{{ $category->name }}">
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Upload
                        </button>
                        {{-- <ul class="list-group">
                            @foreach ($errors->all() as $error)
                                <li class="list-group-item text-danger">{{ $error }}</li>
                            @endforeach
                        </ul> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
