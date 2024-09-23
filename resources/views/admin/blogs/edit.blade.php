@props(['categories', 'blog'])

<x-admin-layout>
    <x-slot name="title">
        Edit Blog
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="mx-auto col-md-10 col-lg-12">
                <h2 class="mt-3 text-center text-primary">Edit Blog Form</h2>
                <div class="p-4 my-3 shadow-sm card">
                    <form autocomplete="off" method="POST" action="{{ route('admin.blogs.update', $blog) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        @method('patch')

                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" value="{{ old('title') ?? $blog->title }}" name="title"
                                class="form-control @error('title')
                                is-invalid
                            @enderror"
                                id="title">
                            <x-error name="title" />
                        </div>
                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" name="slug"
                                class="form-control @error('slug')
                                is-invalid
                            @enderror"
                                value="{{ old('slug') ?? $blog->slug }}" id="slug">
                            <x-error name="slug" />
                        </div>
                        <div class="mb-3">
                            <label for="intro" class="form-label">Intro</label>
                            <input type="text" name="intro"
                                class="form-control @error('intro')
                                is-invalid
                            @enderror"
                                value="{{ old('intro') ?? $blog->intro }}" id="intro">
                            <x-error name="intro" />
                        </div>
                        <div class="mb-3">
                            <label for="body" class="form-label">Body</label>
                            <textarea rows="7"
                                class="form-control @error('body')
                                is-invalid
                            @enderror"
                                name="body" id="body">{{ old('body') ?? $blog->body }}</textarea>
                            <x-error name="body" />
                        </div>
                        <div class="mb-3">
                            <label for="thumbnail" class="form-label">Choose Category</label>
                            <input type="file" value="{{ old('thumbnail') }}" name="thumbnail"
                                class="form-control @error('thumbnail')
                                is-invalid
                            @enderror"
                                id="thumbnail">
                            <x-error name="thumbnail" />
                            <div class="border rounded p-2 mt-2" style="width: fit-content;">
                                <img src="{{ asset("storage/$blog->thumbnail") }}" alt="" width="200px"
                                    height="100px">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Choose Category</label>
                            <select class="form-select" id="category_id" name="category_id">
                                @foreach ($categories as $category)
                                    <option
                                        {{ $category->id == old('category_id') || $category->id == $blog->category->id ? 'selected' : '' }}
                                        value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <a href="{{ route('admin.blogs') }}" class="btn btn-primary">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-primary">
                            Update
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
