@props(['blogs'])

<x-admin-layout>

    <x-slot name="title">
        Dashboard
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="mx-auto col-md-10 col-lg-12">
                <h2 class="mt-3 text-center text-primary">Blogs</h2>
                <x-card-wrapper>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Intro</th>
                                <th scope="col" colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $blog)
                                <tr class="py-2">
                                    <td>{{ Str::substr($blog->title, 0, 30) }}</td>
                                    <td>{{ Str::substr($blog->intro, 0, 20) }}</td>
                                    <td>
                                        @auth
                                            @if (auth()->user()->isAuthorized($blog))
                                                <a class="btn btn-sm btn-warning" role="button"
                                                    href="{{ route('admin.blogs.edit', $blog) }}">Edit</a>
                                                <button form="delete-blog" type="submit" class="btn btn-sm btn-danger">
                                                    Delete
                                                </button>
                                                <form class="d-none" id="delete-blog"
                                                    action="{{ route('admin.blogs.destroy', $blog) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                            @endif
                                        @endauth
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $blogs->links() }}
                </x-card-wrapper>

            </div>
        </div>
    </div>

</x-admin-layout>
