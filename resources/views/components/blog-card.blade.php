@props(['blog'])

<div class="card rounded shadow">
    <img src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg"
        class="card-img-top" alt="..." />
    <div class="card-body">
        <h3 class="card-title text-truncate">{{ $blog->title }}</h3>

        <div class="d-flex align-items-start justify-content-start justify-content-md-between">
            <div class="d-flex items-center">
                <div>
                    <img src="https://i.pravatar.cc/300" class="rounded-circle" width="50" height="50"
                        alt="">
                </div>
                <div class="ms-3 d-flex align-items-start flex-column">
                    <h6>
                        <a class="text-decoration-none text-black" href="/user/{{ $blog->author->username }}">
                            {{ $blog->author->name }}
                        </a>
                    </h6>
                    <p class="text-secondary ms-0">
                        {{ $blog->created_at->diffForHumans() }}
                    </p>
                </div>
            </div>
            <div class="tags ms-3">
                <a class="text-decoration-none" href="/categories/{{ $blog->category->slug }}">
                    <span class="badge bg-primary">{{ $blog->category->name }}</span>
                </a>
            </div>
        </div>
        <p class="card-text text-truncate">
            {{ $blog->intro }}
        </p>
        <div class="text-center"><a href="/blogs/{{ $blog->slug }}" class="btn btn-primary">Read More</a></div>
    </div>
</div>
