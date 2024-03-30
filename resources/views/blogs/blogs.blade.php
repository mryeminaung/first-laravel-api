{{-- <x-layout>
    <!-- hero section -->
    <x-hero />

    <!-- blogs section -->
    <x-blogs-section :blogs="$blogs" />

    <!-- subscribe new blogs -->
    <x-subscribe />

</x-layout> --}}

@extends('blogs.home')

@section('title')
    <title>All Blogs</title>
@endsection

@section('content')
    <article class="mb-3">
        <h1 class="text-3xl font-bold underline"><a href="/blogs/first-blog">First Blog</a></h1>
        <p>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tenetur ipsum rerum id ipsa incidunt quod laborum
            repellat magni saepe fuga distinctio ullam repellendus, laboriosam hic molestiae adipisci nobis illum veniam
            sed voluptas. Praesentium atque possimus aut dignissimos deserunt dolores culpa reprehenderit itaque, quam
            molestias eligendi doloremque debitis fuga minima animi ut, nihil aperiam sint quisquam? Illum sunt eligendi
            unde provident quasi, animi maiores itaque, in atque illo enim aperiam commodi maxime. Eum dolor deserunt
            recusandae aliquam dicta pariatur rerum ad iusto expedita sunt soluta, quidem labore, natus itaque aliquid
            ducimus sint incidunt? Impedit cum esse culpa earum facere repellendus commodi?
        </p>
    </article>
    <article class="mb-3">
        <h1 class="text-3xl font-bold underline"><a href="/blogs/second-blog">Second Blog</a></h1>
        <p>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tenetur ipsum rerum id ipsa incidunt quod laborum
            repellat magni saepe fuga distinctio ullam repellendus, laboriosam hic molestiae adipisci nobis illum veniam
            sed voluptas. Praesentium atque possimus aut dignissimos deserunt dolores culpa reprehenderit itaque, quam
            molestias eligendi doloremque debitis fuga minima animi ut, nihil aperiam sint quisquam? Illum sunt eligendi
            unde provident quasi, animi maiores itaque, in atque illo enim aperiam commodi maxime. Eum dolor deserunt
            recusandae aliquam dicta pariatur rerum ad iusto expedita sunt soluta, quidem labore, natus itaque aliquid
            ducimus sint incidunt? Impedit cum esse culpa earum facere repellendus commodi?
        </p>
    </article>
    <article class="mb-3">
        <h1 class="text-3xl font-bold underline"><a href="/blogs/third-blog">Third Blog</a></h1>
        <p>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tenetur ipsum rerum id ipsa incidunt quod laborum
            repellat magni saepe fuga distinctio ullam repellendus, laboriosam hic molestiae adipisci nobis illum veniam
            sed voluptas. Praesentium atque possimus aut dignissimos deserunt dolores culpa reprehenderit itaque, quam
            molestias eligendi doloremque debitis fuga minima animi ut, nihil aperiam sint quisquam? Illum sunt eligendi
            unde provident quasi, animi maiores itaque, in atque illo enim aperiam commodi maxime. Eum dolor deserunt
            recusandae aliquam dicta pariatur rerum ad iusto expedita sunt soluta, quidem labore, natus itaque aliquid
            ducimus sint incidunt? Impedit cum esse culpa earum facere repellendus commodi?
        </p>
    </article>
@endsection
