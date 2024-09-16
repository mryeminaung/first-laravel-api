@props(['randomBlogs'])

<section class="blogs_you_may_like ">
    <div class="container">
        <h3 class="my-4 text-center fw-bold">Blogs You May Like</h3>
        <div class="row ">
            @foreach ($randomBlogs as $blog)
                <div class="mb-4 col col-md-6 col-lg-4">
                    <div class="border shadow card">
                        <img src="{{ $blog->thumbnail
                            ? asset("storage/$blog->thumbnail")
                            : 'https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg' }}"
                            class="card-img-top" alt="..." style="width: 100%; height: 350px;" />
                        <div class="card-body">
                            <h3 class="card-title text-truncate">{{ $blog->title }}</h3>
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="items-center d-flex">
                                    <div>
                                        <img src="{{ $blog->author->avatar }}" class="rounded-circle" width="50"
                                            height="50" alt="">
                                    </div>
                                    <div class="ms-3 d-flex align-items-start flex-column">
                                        <h6>
                                            <a class="text-black text-decoration-none"
                                                href="/blogs/?username={{ $blog->author->username }}{{ request('category') ? '&category=' . request('category') : null }}{{ request('search') ? '&search=' . request('search') : null }}">
                                                {{ $blog->author->name }}
                                            </a>
                                        </h6>
                                        <p class="text-secondary ms-0">
                                            {{ $blog->created_at->diffForHumans() }}
                                        </p>
                                    </div>
                                </div>
                                <div class="tags">
                                    <a class="text-decoration-none" href="/blogs/?category={{ $blog->category->slug }}">
                                        <span class="badge bg-primary">{{ $blog->category->name }}</span>
                                    </a>
                                </div>
                            </div>
                            <p class="card-text text-truncate">
                                {{ $blog->intro }}
                            </p>
                            <a href="/blogs/{{ $blog->slug }}" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
