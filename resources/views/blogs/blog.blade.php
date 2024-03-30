{{-- <x-layout>
    <!-- singloe blog section -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto text-center">
                <img src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg"
                    class="card-img-top" alt="..." />
                <h3 class="my-3">{{ $blog->title }}</h3>
                <p class="lh-md">
                    {{ $blog->body }}
                </p>
            </div>
        </div>
    </div>

    <x-subscribe />

    <x-blogs_you_may_like_section :randomBlogs="$randomBlogs" />

</x-layout> --}}

@extends('blogs.home')

@section('title')
    <title>Single Blog</title>
@endsection

@section('content')
    <?= $blog ?>

    {{-- <article>
        <h1 class="text-3xl font-bold">First Blog</h1>
        <p>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tenetur ipsum rerum id ipsa incidunt quod laborum
            repellat magni saepe fuga distinctio ullam repellendus, laboriosam hic molestiae adipisci nobis illum veniam
            sed voluptas. Praesentium atque possimus aut dignissimos deserunt dolores culpa reprehenderit itaque, quam
            molestias eligendi doloremque debitis fuga minima animi ut, nihil aperiam sint quisquam? Illum sunt eligendi
            unde provident quasi, animi maiores itaque, in atque illo enim aperiam commodi maxime. Eum dolor deserunt
            recusandae aliquam dicta pariatur rerum ad iusto expedita sunt soluta, quidem labore, natus itaque aliquid
            ducimus sint incidunt? Impedit cum esse culpa earum facere repellendus commodi?
        </p>
        <a href="/" class="bg-blue-500 p-2 rounded-md mt-3 inline-block">Back to blogs</a>
    </article> --}}
@endsection
