@props(['categories'])

<x-admin-layout>

    <x-slot name="title">
        Create Blog
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="mx-auto col-md-10 col-lg-12">
                <h2 class="mt-3 text-center text-primary">Create New Blog</h2>
                <div class="p-4 my-3 shadow-sm card">
                    <form autocomplete="off" method="POST" action="{{ route('admin.blogs.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('post')

                        <x-form.input name="title" />

                        <x-form.input name="slug" />

                        <x-form.input name="intro" />

                        <x-form.textarea name="body" />

                        <x-form.input type="file" name="thumbnail" />

                        <x-form.select :categories="$categories" />

                        <a href="{{ route('admin.blogs') }}" class="btn btn-primary">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-primary">
                            Upload
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>

</x-admin-layout>
